<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function __construct()
    {
        $categories = Category::where('status', 'active')->get();
        View::share('categories_search', $categories);
    }
}
