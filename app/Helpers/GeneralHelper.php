<?php

use Illuminate\Support\Facades\Storage;
use App\Models\Attribute;
use App\Models\Product;

if (!function_exists('escape_like')) {
    /**
     * escape_like
     *
     * @param $string
     * @return mixed
     */
    function escape_like($string)
    {
        $search = array('%', '_', '&', '*', ',', '|');
        $replace = array('\%', '\_', '\&', '\*', '\,', '\|');
        return str_replace($search, $replace, $string);
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


