<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Regency;
// use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use DB;
use DataTables;

class RegencyController extends Controller
{
    public function json()
    {
        $data = DB::select("SELECT b.id AS id, b.nameupper AS nameupper, a.short AS short FROM mw_2kab AS b JOIN mw_1prv AS a ON b.province_id = a.id");

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $form1 = '<form action="'. route("regencies.destroy", $row->id) .'" method="post">'. csrf_field() . method_field("DELETE");
                    $updateButton = '<a href="'. route("regencies.edit", $row->id) .'" class="btn btn-primary btn-sm"> Edit</a>';
                    $deleteButton = '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure Want to Delete?\')"> Delete</button>';
                $form2 = '</form>';
                return $form1." ".$updateButton." ".$deleteButton." ".$form2;
            }) 
            ->make();
    }

    public function index()
    {
        return view('be.regencies.index');
    }

    public function create()
    {
        // $provincies = DB::table('mw_1prv')->where('f_pg', 1)->orderBy('id')->get();
        $provincies = DB::table('mw_1prv')->orderBy('id')->get();
        return view('be.regencies.create',compact('provincies'));
        
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id'            => 'required|min:4|max:4|unique:mw_2kab,id',
            'province_id'   => 'required|min:2|max:2',
            'name'          => 'required|min:5',
            'nameupper'     => 'required|min:5',
            'status'        => 'required',
        ]);

        //create data
        Regency::create([
            'id'            => $request->id,
            'province_id'   => $request->province_id,
            'name'          => $request->name,
            'nameupper'     => $request->nameupper,
            'status'        => $request->status,
        ]);

        activity()->event('regency-store')->withProperties(['name' => $request->name])->log('regency added success');
        return redirect()->route('regencies.index')->with('success','New regency -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        dd('regencies.show');
    }

    public function edit(Regency $regency)
    {
        $provincies = DB::table('mw_1prv')->orderBy('id')->get();
        return view('be.regencies.edit', ['regency' => $regency],compact('provincies'));
    }

    public function update(Request $request, Regency $regency): RedirectResponse
    {
        $old_id = $regency->id;
        $old_name = $regency->name;
        $input = $request->all();
        $regency->update($input);
        activity()->event('regency-update')->withProperties(['id' => $regency->id,'name' => $regency->name,'id_old' => $old_id,'old_name' => $old_name])->log('regency updated success');
        return redirect()->route('regencies.index')->with('success','Regency -' . $regency->name . '- is updated successfully.');
    }

    public function destroy(Regency $regency): RedirectResponse
    {
        $regency->delete();
        activity()->event('regency-delete')->withProperties(['name' => $regency->name,'id' => $regency->id])->log('regency deleted success');
        return redirect()->route('regencies.index')->with('success', 'Regency -' . $regency->name . '- is deleted successfully.');
    }
}
