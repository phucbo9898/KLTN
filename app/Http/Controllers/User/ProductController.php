<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $id)
    {
        $product = Product::find($id);
        $ratings = Rating::where('product_id',$id)->orderBy('id','DESC')->get();
        // get number rating *
        $fivestar = Rating::where('product_id',$id)->where('number',5)->count();
        $forstar = Rating::where('product_id',$id)->where('number',4)->count();
        $threestar = Rating::where('product_id',$id)->where('number',3)->count();
        $twostar = Rating::where('product_id',$id)->where('number',2)->count();
        $onestar = Rating::where('product_id',$id)->where('number',1)->count();
        // push array for transmission
        $eachstar =[
            1 => $onestar,
            2 => $twostar,
            3 => $threestar,
            4 => $forstar,
            5 => $fivestar
        ];
        $data = [
            'product' => $product,
            'ratings' => $ratings,
            'eachstar' => $eachstar
        ];
        return view('fe.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
