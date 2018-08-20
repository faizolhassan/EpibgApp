<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\V1\GetDownloadRequest;
use App\Requests;

class DownloadController extends ApiController
{
    protected $filename;

    public function download(GetDownloadRequest $request)
    {
        return Storage::download('public/epibgFile/'.$request->filename);    
        
    }

    public function index()
    {
        return Storage::AllFiles('public/epibgFile');
    }

}
