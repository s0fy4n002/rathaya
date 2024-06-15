<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontpage;

class FrontController extends Controller
{
    public function edit(Request $request, Frontpage $frontpage)
    {
        return view('be.frontpage.edit', ['data' => $frontpage]);
    }

    public function update(Request $request, Frontpage $frontpage)
    {
        // dd($request->all());

        $this->validate($request, [
        //     'name'      => 'required|min:5',
            'mission_image'      => 'mimes:png,webp,jpeg,jpg|max:1024', // maks cek ulang
        //     'website'   => 'required|min:5',
        //     'f_active'  => 'required',
        ]);

        $input = $request->all();
        $frontpage->update($input);

        // mission_image
        if ($request->hasFile('mission_image')){
            $image = $request->file('mission_image');
            $ext = $request->file('mission_image')->extension();
            $name = 'fe-mission.' . $ext ;
            $destinationPath = public_path('/imgfe');
            $image->move($destinationPath, $name);
            Frontpage::where('id', $frontpage->id)->update(array('mission_image' => $name,));
        }

        // work_image
        if ($request->hasFile('work_image')){
            $image = $request->file('work_image');
            $ext = $request->file('work_image')->extension();
            $name = 'fe-work.' . $ext ;
            $destinationPath = public_path('/imgfe');
            $image->move($destinationPath, $name);
            Frontpage::where('id', $frontpage->id)->update(array('work_image' => $name,));
        }

        activity()->event('frontpage-update')->log('frontpage updated success');
        return redirect()->route('frontpage.edit',1)->with('success','Frontpage is updated successfully.');
    }
}
