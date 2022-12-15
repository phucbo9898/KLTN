<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $products = Product::all();
        $data = [
            'products' => $products
        ];
        return view('cms.warehouse.import',$data);
    }

    public function importProduct(Request $request,$id)
    {
        $product = Product::find($id);
        if($product->quantity + $request->product_number < 0)
        {
            $request->session()->flash('import_error', 'Sản phẩm "'.$product->name.' " mã sản phẩm là '.$id.' chỉ còn '.$product->quantity.' trong kho !');
            return redirect()->route('admin.warehouse.import');
        }
        $product->quantity = $product->quantity + $request->product_number;
        $product->save();
        ProductHistory::insert(
            [
                'product_id' => $id,
                'number_import' => $request->product_number,
                'time_import' => Carbon::now()
            ]
        );
        $request->session()->flash('import_success', 'Đã thêm '.$request->product_number.' sản phẩm "'.$product->name.' " mã sản phẩm là '.$id.' vào kho !');
        return redirect()->route('admin.warehouse.import');
    }

    public function history()
    {
        $productHistory = ProductHistory::all();
        $data = [
            'productHistory' => $productHistory
        ];
        return view('cms.warehouse.history',$data);
    }
}
