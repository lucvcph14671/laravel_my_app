<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /// Lưu ảnh 
    public function saveFile($file, $prefixName = '', $folder = 'public')
    {

        $fileName = $file->hashName();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;

        return $file->storeAs($folder, $fileName);
    }

    // Xóa ảnh 

    public function deleteFile($imageCaytegory){

        $urlLink = $imageCaytegory->image;

        if(file_exists($urlLink)){

           return unlink($urlLink);
        }
    }
}
