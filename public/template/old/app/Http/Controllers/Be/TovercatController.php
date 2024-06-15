<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tovercat;

class TovercatController extends Controller
{
    public function index()
    {
        $datas = Tovercat::orderBy('id','desc')->paginate(10);
        return view('be.tovercats.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('be.tovercats.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_lid'  => 'required',
            'cat_lid'   => 'required',
            'name_len'  => 'required',
            'cat_len'   => 'required',
            'f_active'  => 'required',
        ]);

        $input = $request->all();

        try {
                $data = Tovercat::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        activity()->event('tovercat-store')->withProperties(['name' => $request->name_lid])->log('turnover category added success');
        return redirect()->route('tovercats.index')->with('success','New turnover category -' . $request->name_lid . '- is added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    // public function edit(string $id)
    public function edit(Tovercat $tovercat)
    {
        return view('be.tovercats.edit', ['data' => $tovercat]);
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Tovercat $tovercat)
    {
        $this->validate($request, [
            'name_lid'  => 'required',
            'cat_lid'   => 'required',
            'name_len'  => 'required',
            'cat_len'   => 'required',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $new_name = $input['name_lid'];
        $old_name = $tovercat->name_lid;
        $tovercat->update($input);

        activity()->event('tovercat-update')->withProperties(['id' => $tovercat->id,'name' => $new_name,'id_old' => $tovercat->id,'name_old' => $old_name])->log('turnover category updated success');
        return redirect()->route('tovercats.index')->with('success','Turnover Category  -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
