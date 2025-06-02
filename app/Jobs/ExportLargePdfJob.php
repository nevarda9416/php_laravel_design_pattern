<?php

namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;

class ExportLargePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $filters; // Filter for the export job

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        // Truy vấn dữ liệu lớn nhưng sử dụng cursor để tiết kiệm bộ nhớ
        $query = \App\Models\Order::query()->where(...); // Apply filters from $this->filters, lọc từ $this->filters
        $orders = $query->cursor(); // Use cursor to handle large datasets, không dùng get()
        $chunks = [];
        $chunkSize = 1000; // Define chunk size
        // Chia nhỏ dữ liệu
        foreach ($orders->chunk($chunkSize) as $chunkIndex => $orderChunk) {
            $pdf = PDF::loadView('pdf.order_chunk', [
                'orders' => $orderChunk,
            ]);
            // Ghi từng chunk PDF vào file tạm
            $chunkPath = "public/exports/chunks/order_chunk_{$chunkIndex}.pdf";
            Storage::put($chunkPath, $pdf->output());
            $chunks[] = storage_path($chunkPath);
        }
        // Gộp các PDF chunk lại thành 1 (nếu cần)
        try {
            $this->mergePdfChunks($chunks, 'public/exports/full_report.pdf');
        } catch (CrossReferenceException|FilterException|PdfTypeException|PdfParserException|PdfReaderException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    private function mergePdfChunks(array $chunkPaths, string $outputPath): void
    {
        // Dùng setasign/fpdi để gộp các file PDF
        $pdf = new \setasign\Fpdi\Fpdi();
        foreach ($chunkPaths as $path) {
            $pageCount = $pdf->setSourceFile($path);
            for ($i = 1; $i <= $pageCount; $i++) {
                $tpl = $pdf->importPage($i);
                $size = $pdf->getTemplateSize($tpl);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);;
                $pdf->useTemplate($tpl);
            }
        }
        Storage::put($outputPath, $pdf->Output('S')); // 'S' => return as string
    }
}
