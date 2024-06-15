<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Howwework;

class HowweworkController extends Controller
{
    public function index()
    {
        return view('be.howwework.index', ['datas' => Howwework::get()]);
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

    public function edit(Howwework $howwework)
    {
        return view('be.howwework.edit', ['data' => $howwework]);
    }

    public function update(Request $request, Howwework $howwework)
    {
        $this->validate($request, [
                'nu'             => 'required|numeric|min:0',
                'title_lid'      => 'required|min:3',
                'title_len'      => 'required|min:3',
                // 'mission_image'      => 'mimes:png,webp,jpeg,jpg|max:1024', // maks cek ulang
            //     'website'   => 'required|min:5',
            //     'f_active'  => 'required',
            ]);

        $input = $request->all();
        $howwework->update($input);

        activity()->event('howwework-update')->log('howwework id: '. $howwework->id .' updated success');
        return redirect()->route('howwework.edit',$howwework->id)->with('success','How we work is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
