<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function upload(Request $request, $destinationName): mixed
    {
        // Path store files on server
        $path = 'storage/app/public';
        // Get file name
        $fileName = $request->get('file_name');
        // 1) Storage disks save file from sftp to local
        Storage::disk('local')->put($destinationName, Storage::disk('sftp')->get($path / $fileName));
        // Others
        // To write the contents of a file to another file in SFTP use the following code
        Storage::disk('sftp')->put($destinationName, file_get_contents($fileName));
        // Download all files from the remote server and store to a storage folder
        $contents = Storage::disk('sftp')->allFiles('/storage/app/public/');
        foreach ($contents as $content) {
            Storage::disk('local')->put($content, Storage::disk('sftp')->get($content));
        }
        // To add content to an existing file
        Storage::disk('sftp')->append($path / $fileName, 'Test content');
        // Download the file from the AWS Server
        Storage::disk('sftp')->download($path / $fileName);
        // Remove the file from the AWS Server
        Storage::disk('sftp')->delete($path / $fileName);

        return true;
    }
}
