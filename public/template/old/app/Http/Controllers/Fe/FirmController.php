<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Firm;
use App\Models\Product;
use App\Models\Firminv;

class FirmController extends Controller
{
    public function index()
    {
        // $firms = Firm::select('id', 'name' ,'name_slug','photo')->where('verification_id',1)->orderBy('name','ASC')->get();
        $firms = Firm::with('pic','province','regency')->where('verification_id',1)->orderBy('name','ASC')->get();
        // dd($firms);
        $data = [
            'firms' => $firms,
        ];
        return view('fe.firm', $data);
        // return view('fe.firms.index',compact('firms'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $data = Firm::with('pic','user','province','regency','bentity','tovercat','firminvs')->where('name_slug',$slug)->first();
        $data->increment('view',1);

        $products = Product::where('user_id',$data->user_id)->get();
        $firminvs = Firminv::with('invneed')->where('user_id',$data->user_id)->get();
        // dd($firminvs);

        $data = [
            'data' => $data,
            'products' => $products,
            'firminvs' => $firminvs,
        ];
        return view('fe.firm-detail', $data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
