<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Village;
use Illuminate\Http\RedirectResponse;
use DB;
use DataTables;

class VillageController extends Controller
{
    public function json()
    {
        $data = DB::select("SELECT d.id,  d.nameupper,  c.nameupper AS district_name, b.`nameupper` AS regency_name,  a.short AS province_name
                                FROM
                                    mw_4kel AS d INNER JOIN mw_3kec AS c ON  d.district_id = c.id
                                                    INNER JOIN mw_2kab AS b ON c.regency_id = b.id
                                                    INNER JOIN mw_1prv AS a ON b.province_id = a.id");
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            // Form
            $form1 = '<form action="'. route("villages.destroy", $row->id) .'" method="post">'. csrf_field() . method_field("DELETE");
            $updateButton = '<a href="'. route("villages.edit", $row->id) .'" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>';
            $deleteButton = '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="bi bi-trash"></i> Delete</button>';
            $form2 = '</form>';
            return $form1." ".$updateButton." ".$deleteButton." ".$form2;
        }) 
        ->make();
    }

    public function index()
    {
        return view('be.villages.index');
    }

    public function create()
    {
        $districts = DB::table('mw_3kec')->orderBy('id')->get();
        return view('be.villages.create',compact('districts'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id'            => 'required|min:10|max:10|unique:mw_4kel,id',
            'district_id'   => 'required|min:7|max:7',
            'name'          => 'required|min:5',
            'nameupper'     => 'required|min:5',
        ]);
        // dd($request->all());
        //create data
        Village::create([
            'id'            => $request->id,
            'district_id'   => $request->district_id,
            'name'          => $request->name,
            'nameupper'     => $request->nameupper,
        ]);

        activity()->event('village-store')->withProperties(['name' => $request->name])->log('village added success');
        return redirect()->route('villages.index')->with('success','New village -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        dd('village show');
    }

    public function edit(Village $village)
    {
        $districts = DB::table('mw_3kec')->orderBy('id')->get();
        return view('be.villages.edit', ['village' => $village],compact('districts'));
    }

    public function update(Request $request, Village $village): RedirectResponse
    {
        $old_id = $village->id;
        $old_name = $village->name;
        $input = $request->all();
        $village->update($input);
        activity()->event('village-update')->withProperties(['id' => $village->id,'name' => $village->name,'id_old' => $old_id,'old_name' => $old_name])->log('village updated success');
        return redirect()->route('villages.index')->with('success','Village -' . $village->name . '- is updated successfully.');
    }

    public function destroy(Village $village): RedirectResponse
    {
        $village->delete();
        activity()->event('village-delete')->withProperties(['name' => $village->name,'id' => $village->id])->log('village deleted success');
        return redirect()->route('villages.index')->with('success', 'Village -' . $village->name . '- is deleted successfully.');
    }
}
