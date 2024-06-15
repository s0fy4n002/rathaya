<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Firm;

class ProductController extends Controller
{
    public function index()
    {

        $datas = Product::select('id', 'name' ,'photo1')->where('f_active',1)->orderBy('name','ASC')->get();
        // dd($datas);
        return view('fe.products.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        // $product = Product::where('name_slug',$slug)->first();
        $product = Product::with('pic','commoditycat')->where('name_slug',$slug)->first();
        $product->increment('view',1);
        $firm    = Firm::where('pic_id',$product->pic_id)->first();
        // dd($product);

        $n=0;
        if($product->photo1){ $n=$n+1; };
        if($product->photo2){ $n=$n+1; };
        if($product->photo3){ $n=$n+1; };
        if($product->photo4){ $n=$n+1; };


        // dd($n);

        $data = [
            'product' => $product,
            'jmlgbr' => $n,
            'firm' => $firm,
        ];

        return view('fe.product-detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
