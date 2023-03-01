<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductHistory;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductHistoryRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct(ProductHistoryRepository $productHistoryRepo, CategoryRepository $categoryRepo, ProductRepository $productRepo)
    {
        $this->productHistoryRepo = $productHistoryRepo;
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $products = $this->productRepo->all();

        return view('cms.warehouse.import', compact('products'));
    }

    public function importProduct(Request $request, $id)
    {
        $product = $this->productRepo->find($id);
//        if ($product->quantity + $request->product_number < 0) {
//            return redirect()->route('admin.warehouse.import')->with('error', 'Sản phẩm "' . $product->name . ' " mã ID là ' . $id . ' chỉ còn ' . $product->quantity . ' trong kho ! Vui lòng nhập thêm');
//        }
        if ($request->product_number < 0) {
            return redirect()->route('admin.warehouse.import')->with('error', 'Vui lòng nhập số nguyên dương!');
        }

        $productQty = $product->quantity + $request->product_number;
        $this->productRepo->update($id, ['quantity' => $productQty]);

        $this->productHistoryRepo->create([
            'product_id' => $id,
            'number_import' => $request->product_number,
            'time_import' => Carbon::now()
        ]);

        return redirect()->route('admin.warehouse.import')->with('success', 'Đã thêm ' . $request->product_number . ' sản phẩm "' . $product->name . ' " mã ID ' . $id . ' vào kho !');
    }

    public function exportProduct(Request $request, $id)
    {
        $product = $this->productRepo->find($id);

        if ($request->product_number < 0) {
            return redirect()->route('admin.warehouse.import')->with('error', 'Vui lòng nhập số nguyên dương!');
        }

        if ($product->quantity - $request->product_number < 0) {
            return redirect()->route('admin.warehouse.import')->with('error', 'Sản phẩm "' . $product->name . ' " mã ID là ' . $id . ' chỉ còn ' . $product->quantity . ' trong kho !');
        }

        $productQty = $product->quantity - $request->product_number;
        $this->productRepo->update($id, ['quantity' => $productQty]);

        $this->productHistoryRepo->create([
            'product_id' => $id,
            'number_import' => $request->product_number,
            'time_import' => Carbon::now()
        ]);

        return redirect()->route('admin.warehouse.import')->with('success', 'Đã xuất ' . $request->product_number . ' sản phẩm "' . $product->name . ' " mã ID là ' . $id);
    }

    public function history(Request $request)
    {
        $options = $request->all();
        $categories = $this->categoryRepo->all();
        $productHistory = $this->productHistoryRepo->query($options)->get();

        return view('cms.warehouse.history', compact('categories', 'productHistory', 'options'));
    }
}
