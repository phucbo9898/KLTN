<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends CustomerController
{
    public function index($slug, $id)
    {
        $checklink = 0;
        $checkproduct = Product::where([
            'category_id' => $id,
            'status' => 'active'
        ])->count();
        $category = Category::find($id);
        if ($checkproduct > 9) {
            $checklink = 1;
            $products = Product::where([
                'category_id' => $id,
                'status' => 'active'
            ])->paginate(9);
        } else {
            $products = Product::where([
                'category_id' => $id,
                'status' => 'active'
            ])->get();
        }
        $data = [
            'category' => $category,
            'products' => $products,
            'checklink' => $checklink
        ];
        return view('fe.category.index', $data);
    }

    public function indexOrder($slug, $id, $order)
    {
        $checklink = 0;
        $checkproduct = Product::where([
            'category_id' => $id,
            'status' => 'active'
        ])->count();
        $category = Category::find($id);
        $products = Product::where([
            'category_id' => $id,
            'status' => 'active',
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
        if ($checkproduct > 9) {
            $checklink = 1;
            $products = $products->paginate(3);
        } else {
            $products = $products->get();
        }
        $data = [
            'category' => $category,
            'products' => $products,
            'checklink' => $checklink
        ];
        return view('fe.category.index', $data);
    }

    public function indexOrderAttribute($slug, $id, $idatv)
    {
        $checklink = 0;
        $category = Category::find($id);
        $products = Product::where([
            'category_id' => $id,
            'status' => 'active',
        ])->get();
        $filterattritebuteproduct = array();
        foreach ($products as $product) {
            foreach ($product->productAttributeValue as $atv) {
                if ($atv->id == $idatv) {
                    array_push($filterattritebuteproduct, $product);
                }
            };
        }
        // dd($filterattritebuteproduct);
        // $checkproduct = count($filterattritebuteproduct);
        // if($checkproduct>9)
        // {
        //     $checklink = 1;
        //     $products =$products->paginate(3);
        // }
        // else
        // {
        //     $products =$products->get();
        // }
        $data = [
            'category' => $category,
            'products' => $filterattritebuteproduct,
            'checklink' => $checklink
        ];
        return view('fe.category.index', $data);
    }
}
