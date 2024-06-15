<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commoditycat;

class CommoditycatController extends Controller
{
    public function index()
    {
        $datas = Commoditycat::orderBy('id','desc')->get();
        return view('be.commoditycats.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('be.commoditycats.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_lid'  => 'required',
            'name_len'  => 'required',
            'f_active'  => 'required',
        ]);

        $input = $request->all();

        try {
                $data = Commoditycat::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        activity()->event('commoditycat-store')->withProperties(['name' => $request->name_lid])->log('commodity category added success');
        return redirect()->route('commoditycats.index')->with('success','New commodity category -' . $request->name_lid . '- is added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    // public function edit(string $id)
    public function edit(Commoditycat $commoditycat)
    {
        return view('be.commoditycats.edit', ['data' => $commoditycat]);
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Commoditycat $commoditycat)
    {
        // dd($request->all());

        $this->validate($request, [
            'name_lid'  => 'required',
            'name_len'  => 'required',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $new_name = $input['name_lid'];
        $old_name = $commoditycat->name_lid;
        $commoditycat->update($input);

        activity()->event('commoditycat-update')->withProperties(['id' => $commoditycat->id,'name' => $new_name,'id_old' => $commoditycat->id,'name_old' => $old_name])->log('commodity category updated success');
        return redirect()->route('commoditycats.index')->with('success','Commodity Category  -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
