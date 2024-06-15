<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Invneed;

class InvneedController extends Controller
{
    public function index()
    {
        $datas = Invneed::orderBy('id','desc')->paginate(10);
        return view('be.invneeds.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('be.invneeds.create');
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
                $data = Invneed::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        activity()->event('invneed-store')->withProperties(['name' => $request->name_lid])->log('investation need added success');
        return redirect()->route('invneeds.index')->with('success','New investation need -' . $request->name_lid . '- is added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    // public function edit(string $id)
    public function edit(Invneed $invneed)
    {
        return view('be.invneeds.edit', ['data' => $invneed]);
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Invneed $invneed)
    {
        $this->validate($request, [
            'name_lid'  => 'required',
            'name_len'  => 'required',
             'f_active'  => 'required',
        ]);

        $input = $request->all();
        $new_name = $input['name_lid'];
        $old_name = $invneed->name_lid;
        $invneed->update($input);

        activity()->event('invneed-update')->withProperties(['id' => $invneed->id,'name' => $new_name,'id_old' => $invneed->id,'name_old' => $old_name])->log('investation need updated success');
        return redirect()->route('invneeds.index')->with('success','Investation Need  -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
