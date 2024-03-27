<?php

use App\Models\Attribute;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

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

if (!function_exists('checkExtensionImage')) {
    function checkExtensionImage($image)
    {
        $extension = $image->getClientOriginalExtension();
        if (!in_array(strtolower($extension), ['jpg', 'png', 'jpeg'])) {
            return false;
        }
        return true;
    }
}

if (!function_exists('chart')) {
    function chart()
    {
        // get 7 day formar Y-m-d
        $today = Carbon::today()->format('Y-m-d'); // 31/05
        $onedago = Carbon::today()->subDays(1)->format('Y-m-d'); // 30/05
        $twodago = Carbon::today()->subDays(2)->format('Y-m-d'); // 29/05
        $threedago = Carbon::today()->subDays(3)->format('Y-m-d');
        $fordago = Carbon::today()->subDays(4)->format('Y-m-d');
        $fivedago = Carbon::today()->subDays(5)->format('Y-m-d');
        $sixdago = Carbon::today()->subDays(6)->format('Y-m-d');

        // get money redemm follow update status completed
        $totaltoday = Transaction::where('updated_at', 'like', '%' . $today . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totalonedago = Transaction::where('updated_at', 'like', '%' . $onedago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totaltwodago = Transaction::where('updated_at', 'like', '%' . $twodago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totalthreedago = Transaction::where('updated_at', 'like', '%' . $threedago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totalfordago = Transaction::where('updated_at', 'like', '%' . $fordago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totalfivedago = Transaction::where('updated_at', 'like', '%' . $fivedago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        $totalsixdago = Transaction::where('updated_at', 'like', '%' . $sixdago . '%')->select('status', 'total', 'created_at')->where('status', 'completed')->sum('total');
        // get 7 day for time graph
        $one = Carbon::today()->subDays(1)->format('d-m');
        $two = Carbon::today()->subDays(2)->format('d-m');
        $three = Carbon::today()->subDays(3)->format('d-m');
        $for = Carbon::today()->subDays(4)->format('d-m');
        $five = Carbon::today()->subDays(5)->format('d-m');
        $six = Carbon::today()->subDays(6)->format('d-m');

        $total_price_seven_days_edit = "" . $totalsixdago . "," . $totalfivedago . "," . $totalfordago . "," . $totalthreedago . "," . $totaltwodago . "," . $totalonedago . "," . $totaltoday . "";
        $time_chart = "" . $six . "," . $five . "," . $for . "," . $three . "," . $two . "," . $one . ",Hôm nay";

        $data = [
            'total_price_seven_days_edit' => $total_price_seven_days_edit,
            'time_chart' => $time_chart
        ];

        return $data;
    }
}
