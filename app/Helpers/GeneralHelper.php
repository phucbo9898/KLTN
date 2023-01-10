<?php

use Illuminate\Support\Facades\Storage;
use App\Models\Attribute;
use App\Models\Product;

if (!function_exists('uploadToS3')) {
   /**
    * @param $request
    * @param $folder
    * @param $files
    * @return string|void
    */
   function uploadToS3($request, $folder, $files)
   {
       if ($request->hasFile($files)) {
           $path = Storage::disk('s3')->put('images/' . $folder, $request->file($files));
           $path = Storage::disk('s3')->url($path);
           return $path;
       }
   }
}

if (!function_exists('dataAttributeValue')) {
    function dataAttributeValue(Attribute $at, Product $product)
    {
        foreach ($product->productAttributeValue as $atv) {
            if ($atv->attribute_id == $at->id) {
                echo $atv->value;
            }
        }
    }
}
if (!function_exists('checkDataAttributeValue')) {
    function checkDataAttributeValue(Attribute $at, Product $product, $value)
    {
        foreach ($product->productAttributeValue as $atv) {
            if ($atv->attribute_id == $at->id) {
                if ($atv->value == $value) {
                    return true;
                }
            }
        }
        return false;
    }
}


