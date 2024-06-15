<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use DB;
use DataTables;

class ProvinceController extends Controller
{
    public function json()
    {
        $data = DB::select("SELECT a.id AS id, a.nameupper AS 'nameupper', a.short, a.f_pg FROM mw_1prv AS a");

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $form1 = '<form action="'. route("provinces.destroy", $row->id) .'" method="post">'. csrf_field() . method_field("DELETE");
                    $updateButton = '<a href="'. route("provinces.edit", $row->id) .'" class="btn btn-primary btn-sm"> Edit</a>';
                    $deleteButton = '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure Want to Delete?\')"> Delete</button>';
                $form2 = '</form>';
                return $form1." ".$updateButton." ".$deleteButton." ".$form2;
            }) 
            ->make();
    }
    
    public function index()
    {
        return view('be.provinces.index');
    }

    public function create()
    {
        return view('be.provinces.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id'        => 'required|min:2|max:2|unique:mw_1prv,id',
            'name'      => 'required|min:5',
            'nameupper' => 'required|min:5',
            'short'     => 'required|min:3',
        ]);

        //create data
        Province::create([
            'id'        => $request->id,
            'name'      => $request->name,
            'nameupper' => $request->nameupper,
            'short'     => $request->short,
            'f_pg'      => $request->f_pg,
        ]);

        activity()->event('province-store')->withProperties(['name' => $request->name])->log('province added success');
        return redirect()->route('provinces.index')->with('success','New province -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        dd('provinces.show');
    }

    public function edit(Province $province)
    {
        return view('be.provinces.edit', ['province' => $province]);
    }

    public function update(Request $request, Province $province): RedirectResponse
    {
        $old_id = $province->id;
        $old_name = $province->name;
        $input = $request->all();
        $province->update($input);
        activity()->event('province-update')->withProperties(['id' => $province->id,'name' => $province->name,'id_old' => $old_id,'old_name' => $old_name])->log('province updated success');
        return redirect()->route('provinces.index')->with('success','Province -' . $province->name . '- is updated successfully.');
    }

    public function destroy(Province $province): RedirectResponse
    {
        $province->delete();
        activity()->event('province-delete')->withProperties(['name' => $province->name,'id' => $province->id])->log('province deleted success');
        return redirect()->route('provinces.index')->with('success','Province -' . $province->name . '- is deleted successfully.');
    }
}
