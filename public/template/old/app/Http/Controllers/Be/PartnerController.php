<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Partner;
use Illuminate\Support\Str; //untuk slug

class PartnerController extends Controller
{
    public function index()
    {
        // return view('be.partners.index', ['datas' => Partner::orderBy('id','desc')->paginate(10)]);
        return view('be.partners.index', ['datas' => Partner::orderBy('id','desc')->get()]);
    }

    public function create()
    {
        return view('be.partners.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'      => 'required|min:5',
            'logo'      => 'mimes:jpeg,jpg|max:1024|dimensions:min_width=100,min_height=50,max_width=500,max_height=500', // maks cek ulang
            'website'   => 'required|min:5',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        try {
                $data = Partner::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        // logo
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = 'pantaugambut-partner-'.Str::slug($request->name) .'-'. $lastId . '.jpg';
            $destinationPath = public_path('/imgpartners');
            $image->move($destinationPath, $name);
            Partner::where('id', $lastId)->update(array('logo' => $name,));
        }

        activity()->event('partner-store')->withProperties(['name' => $request->name])->log('partner added success');
        return redirect()->route('partners.index')->with('success','New partner -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Partner $partner)
    {
        return view('be.partners.edit', ['data' => $partner]);
    }

    // public function update(Request $request, string $id)
    // public function update(Request $request, Partner $partner): RedirectResponse
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'name'      => 'required|min:5',
            'logo'      => 'mimes:jpeg,jpg|max:1024|dimensions:min_width=100,min_height=50,max_width=500,max_height=500', // maks cek ulang
            'website'   => 'required|min:5',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $old_name = $partner->name;
        $new_name = $input['name'];
        $old_logo = $partner->logo;
        $partner->update($input);

        // logo
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = $old_logo;
            $destinationPath = public_path('/imgpartners');
            $image->move($destinationPath, $name);
            Partner::where('id', $partner->id)->update(array('logo' => $name,));
        }

        activity()->event('partner-update')->withProperties(['id' => $partner->id,'name' => $new_name,'id_old' => $partner->id,'name_old' => $old_name])->log('partner updated success');
        return redirect()->route('partners.index')->with('success','Partner -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
