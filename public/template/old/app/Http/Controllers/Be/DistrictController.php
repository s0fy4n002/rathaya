<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use Illuminate\Http\RedirectResponse;
use DB;
use DataTables;

class DistrictController extends Controller
{
    public function json()
    {
        $data = DB::select("SELECT c.id as 'id', c.nameupper as 'nameupper', b.nameupper as 'regency_name', a.short as 'province_name'
                                FROM mw_3kec AS c INNER JOIN mw_2kab AS b
                                    ON c.regency_id = b.id INNER JOIN mw_1prv AS a
                                    ON  b.province_id = a.id");

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                // Form
                $form1 = '<form action="'. route("districts.destroy", $row->id) .'" method="post">'. csrf_field() . method_field("DELETE");
                $updateButton = '<a href="'. route("districts.edit", $row->id) .'" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>';
                $deleteButton = '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="bi bi-trash"></i> Delete</button>';
                $form2 = '</form>';
                return $form1." ".$updateButton." ".$deleteButton." ".$form2;
            }) 
            ->make();
    }

    public function index()
    {
        return view('be.districts.index');
    }

    public function create()
    {
        $regencies = DB::table('mw_2kab')->orderBy('id')->get();
        return view('be.districts.create',compact('regencies'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id'            => 'required|min:7|max:7|unique:mw_3kec,id',
            'regency_id'    => 'required|min:4|max:4',
            'name'          => 'required|min:5',
            'nameupper'     => 'required|min:5',
        ]);

        //create data
        District::create([
            'id'            => $request->id,
            'regency_id'    => $request->regency_id,
            'name'          => $request->name,
            'nameupper'     => $request->nameupper,
        ]);

        activity()->event('district-store')->withProperties(['name' => $request->name])->log('district added success');
        return redirect()->route('districts.index')->with('success','New district -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        dd('district show');
    }

    public function edit(District $district)
    {
        $regencies = DB::table('mw_2kab')->orderBy('id')->get();
        return view('be.districts.edit', ['district' => $district],compact('regencies'));
    }

    public function update(Request $request, District $district): RedirectResponse
    {
        $old_id = $district->id;
        $old_name = $district->name;
        $input = $request->all();
        $district->update($input);
        activity()->event('district-update')->withProperties(['id' => $district->id,'name' => $district->name,'id_old' => $old_id,'old_name' => $old_name])->log('district updated success');
        return redirect()->route('districts.index')->with('success','District -' . $district->name . '- is updated successfully.');
    }

    public function destroy(District $district): RedirectResponse
    {
        $district->delete();
        activity()->event('district-delete')->withProperties(['name' => $district->name,'id' => $district->id])->log('district deleted success');
        return redirect()->route('districts.index')->with('success', 'District -' . $district->name . '- is deleted successfully.');
    }
}
