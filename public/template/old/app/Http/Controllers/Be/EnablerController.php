<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enabler;
use Illuminate\Support\Str; //untuk slug

class EnablerController extends Controller
{
    public function index()
    {
        return view('be.enablers.index', ['datas' => Enabler::orderBy('id','asc')->get()]);
    }

    public function create()
    {
        return view('be.enablers.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'      => 'required|min:5',
            'logo'      => 'mimes:jpeg,jpg|max:1024|dimensions:min_width=100,min_height=50,max_width=500,max_height=500', // maks ok
            'website'   => 'required|min:5',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        try {
                $data = Enabler::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        // logo
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = 'pantaugambut-enabler-'.Str::slug($request->name) .'-'. $lastId . '.jpg';
            $destinationPath = public_path('/imgenablers');
            $image->move($destinationPath, $name);
            Enabler::where('id', $lastId)->update(array('logo' => $name,));
        }

        activity()->event('enabler-store')->withProperties(['name' => $request->name])->log('enabler added success');
        return redirect()->route('enablers.index')->with('success','New enabler -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    // public function edit(string $id)
    public function edit(Enabler $enabler)
    {
        return view('be.enablers.edit', ['data' => $enabler]);
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Enabler $enabler)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'      => 'required|min:5',
            'logo'      => 'mimes:jpeg,jpg|max:1024|dimensions:min_width=100,min_height=50,max_width=500,max_height=500', // maks cek ulang
            'website'   => 'required|min:5',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $old_name = $enabler->name;
        $new_name = $input['name'];
        $old_logo = $enabler->logo;
        $enabler->update($input);

        // logo
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = $old_logo;
            $destinationPath = public_path('/imgenablers');
            $image->move($destinationPath, $name);
            Enabler::where('id', $enabler->id)->update(array('logo' => $name,));
        }

        activity()->event('enabler-update')->withProperties(['id' => $enabler->id,'name' => $new_name,'id_old' => $enabler->id,'name_old' => $old_name])->log('enabler updated success');
        return redirect()->route('enablers.index')->with('success','Enabler -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
