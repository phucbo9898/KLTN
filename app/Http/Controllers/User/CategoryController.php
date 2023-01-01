<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            case 'd1t':
                $products->where('price', '<', 1000000);
                break;
            case '1t-10t':
                $products->whereBetween('price', [1000000, 10000000]);
                break;
            case '10t-20t':
                $products->whereBetween('price', [10000000, 20000000]);
                break;
            case '20t-50t':
                $products->whereBetween('price', [20000000, 50000000]);
                break;
            case 't50t':
                $products->where('price', '>', 50000000);
                break;
            case 'az':
                $products->orderBy('name', 'ASC');
                break;
            case 'za':
                $products->orderBy('name', 'DESC');
                break;
            case 'mn':
                $products->orderBy('created_at', 'DESC');
                break;
            case 'cn':
                $products->orderBy('created_at', 'ASC');
                break;
            case 'td':
                $products->orderBy('price', 'ASC');
                break;
            case 'gd':
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
            foreach ($product->ProductAndAttributeValue as $atv) {
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
