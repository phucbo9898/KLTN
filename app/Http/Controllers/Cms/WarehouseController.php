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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        try {
            DB::beginTransaction();
            $product = $this->productRepo->find($id);
            if (!$product) {
                return redirect()->back()->with('error', __('The requested resource is not available'));
            }
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

            DB::commit();
            return redirect()->route('admin.warehouse.import')->with('success', 'Đã thêm ' . $request->product_number . ' sản phẩm "' . $product->name . ' " mã ID ' . $id . ' vào kho !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }

    public function exportProduct(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepo->find($id);
            if (!$product) {
                return redirect()->back()->with('error', __('The requested resource is not available'));
            }
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
                'number_export' => $request->product_number,
                'time_export' => Carbon::now()
            ]);

            DB::commit();
            return redirect()->route('admin.warehouse.import')->with('success', 'Đã xuất ' . $request->product_number . ' sản phẩm "' . $product->name . ' " mã ID là ' . $id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }

    public function historyImport(Request $request)
    {
        $options = $request->all();
        $categories = $this->categoryRepo->all();
        $productHistory = $this->productHistoryRepo->queryImport($options)->get();

        return view('cms.warehouse.history-import', compact('categories', 'productHistory', 'options'));
    }

    public function historyExport(Request $request)
    {
        $options = $request->all();
        $categories = $this->categoryRepo->all();
        $productHistory = $this->productHistoryRepo->queryExport($options)->get();

        return view('cms.warehouse.history-export', compact('categories', 'productHistory', 'options'));
    }
}
