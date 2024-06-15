<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enabler;

class EnablerController extends Controller
{
    public function index()
    {
        $enablers = Enabler::select('id', 'name' ,'logo', 'website')->where('f_active',1)->orderBy('name','ASC')->get();
        // dd($enablers);
        // return view('fe.enablers.index',compact('enablers'));

        $data = [
            'enablers' => $enablers,
        ];

        return view('fe.enabler', $data);
        // return view('fe.enabler');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
