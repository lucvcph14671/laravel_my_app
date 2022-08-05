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

    public function deleteFile($imageCaytegory)
    {

        $urlLink = $imageCaytegory->image;

        if (file_exists($urlLink)) {

            return unlink($urlLink);
        }
    }

    // xóa list ảnh product
    public function deleteFiles($count_img, $image_db)
    {


        for ($i = 0; $i > $count_img; $i++) {

            $urlLink = $image_db->images;
            dd($urlLink);
            if (file_exists($urlLink)) {

                return unlink($urlLink);
            }
        }
    }

    public function deleteImg($imageCaytegory)
    {

        $urlLink = $imageCaytegory->thumbnail;

        if (file_exists($urlLink)) {

            return unlink($urlLink);
        }
    }

}
