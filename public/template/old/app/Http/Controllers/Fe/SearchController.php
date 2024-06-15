<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Firm;
use App\Models\Product;

class SearchController extends Controller
{
    public function index()
    {
        return view('fe.search');
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'txtsearch'      => 'required|min:1',
        ]);

        $cari = $request->txtsearch;

        $firms = Firm::select('id', 'name', 'name_slug')->where('verification_id',1)->where('name','like',"%".$cari."%")->orderBy('name','ASC')->get();
        $products = Product::select('id', 'name', 'name_slug')->where('f_active',1)->where('name','like',"%".$cari."%")->orderBy('name','ASC')->get();
        $resultcount = $firms->count() + $products->count();

        $data = [
            'firms'     => $firms,
            'products'  => $products,
            'resultcount' => $resultcount,
        ];

        // dd($data);

        return view('fe.search-result', $data);
    }

}
