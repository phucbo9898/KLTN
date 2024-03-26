<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Attribute;
use Illuminate\Http\Request;

class CategoryController extends CustomerController
{
    public function index($slug, $id)
    {
        $categoryDetail = Category::find($id);
        $products = Product::where([
            'category_id' => $id,
            'status' => ActiveStatus::ACTIVE
        ])->paginate(10);
        return view('fe.category.index', ['categoryDetail' => $categoryDetail, 'products' => $products]);
    }

    public function indexOrder($slug, $id, $order)
    {
        $categoryDetail = Category::find($id);
        $products = Product::where([
            'category_id' => $id,
            'status' => ActiveStatus::ACTIVE
        ]);
        switch ($order) {
            case 'duoi-1trieu':
                $products->where('price', '<', 1000000);
                break;
            case '1trieu-den-10trieu':
                $products->whereBetween('price', [1000000, 10000000]);
                break;
            case '10trieu-den-20trieu':
                $products->whereBetween('price', [10000000, 20000000]);
                break;
            case '20trieu-den-50trieu':
                $products->whereBetween('price', [20000000, 50000000]);
                break;
            case 'tren-50trieu':
                $products->where('price', '>', 50000000);
                break;
            case 'sap-xep-tang-dan':
                $products->orderBy('name', 'ASC');
                break;
            case 'sap-xep-giam-dan':
                $products->orderBy('name', 'DESC');
                break;
            case 'sap-xep-theo-san-pham-moi-nhat':
                $products->orderBy('created_at', 'DESC');
                break;
            case 'sap-xep-theo-san-pham-cu-nhat':
                $products->orderBy('created_at', 'ASC');
                break;
            case 'sap-xep-theo-gia-tang-dan':
                $products->orderBy('price', 'ASC');
                break;
            case 'sap-xep-theo-gia-giam-dan':
                $products->orderBy('price', 'DESC');
                break;
            default:
                dd("Lỗi");
                break;
        }
        $products = $products->paginate(10);
        return view('fe.category.index', ['categoryDetail' => $categoryDetail, 'products' => $products]);
    }

    public function indexOrderAttribute($slug, $id, $idatv)
    {
        $categoryDetail = Category::find($id);
        $getArrayIdProductByIdAttribute = Product_Attribute::where('attribute_value_id', $idatv)->pluck('product_id')->toArray();
        $products = Product::where([
            'category_id' => $id,
            'status' => ActiveStatus::ACTIVE,
        ])->whereIn('id', $getArrayIdProductByIdAttribute)->paginate(10);
        return view('fe.category.index', ['categoryDetail' => $categoryDetail, 'products' => $products]);
    }
}
