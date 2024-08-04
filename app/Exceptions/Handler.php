<?php

namespace App\Exceptions;

use App\Core\Enums\CommonEnum;
use App\Http\Controllers\CacheController;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render($request, Exception|Throwable $exception)
    {
        $html_header = CacheController::cacheHTMLHeader();
        $html_footer = CacheController::cacheHTMLFooter();
        // Custom HTTP Exceptions pages
        if ($this->isHttpException($exception)) {
            if (view()->exists(CommonEnum::FOLDER_ERROR.$exception->getStatusCode())) {
                return response()->view(CommonEnum::FOLDER_ERROR.$exception->getStatusCode(), ['html_header' => $html_header, 'html_footer' => $html_footer], $exception->getStatusCode());
            }
        } else {
            if (env('APP_DEBUG') == false) {
                return response()->view(CommonEnum::FOLDER_ERROR.'500', ['html_header' => $html_header, 'html_footer' => $html_footer], 500);
            }
        }
        // Handle Laravel showing "419 Page Expired", redirect to the homepage
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('/');
        }

        return parent::render($request, $exception);
    }
}
