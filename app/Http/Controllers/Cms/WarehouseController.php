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
    private $productHistoryRepository;
    private $categoryRepository;
    private $productRepository;

    public function __construct(
        ProductHistoryRepository $productHistoryRepository,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->productHistoryRepository = $productHistoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function import()
    {
        $products = $this->productRepository->all();

        return view('cms.warehouse.import', compact('products'));
    }

    public function importProduct(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepository->find($id);
            if (!$product) {
                return redirect()->back()->with('error', __('The requested resource is not available'));
            }
            if ($request->product_number < 0) {
                return redirect()->route('admin.warehouse.import')->with('error', 'Vui lòng nhập số nguyên dương!');
            }

            $productQty = $product->quantity + $request->product_number;
            $this->productRepository->update($id, ['quantity' => $productQty]);

            $this->productHistoryRepository->create([
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
            $product = $this->productRepository->find($id);
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
            $this->productRepository->update($id, ['quantity' => $productQty]);

            $this->productHistoryRepository->create([
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
        $categories = $this->categoryRepository->all();
        $productHistory = $this->productHistoryRepository->queryImport($options)->get();

        return view('cms.warehouse.history-import', compact('categories', 'productHistory', 'options'));
    }

    public function historyExport(Request $request)
    {
        $options = $request->all();
        $categories = $this->categoryRepository->get();
        $productHistory = $this->productHistoryRepository->queryExport($options)->get();

        return view('cms.warehouse.history-export', compact('categories', 'productHistory', 'options'));
    }
}
