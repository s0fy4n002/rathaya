<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view('be.sliders.index', ['datas' => Slider::get()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Request $request, Slider $slider)
    {
        return view('be.sliders.edit', ['data' => $slider]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title_lid'     => 'required|min:5',
            'title_len'     => 'required|min:5',
            'image'         => 'mimes:jpeg,jpg|max:1024', // maks cek ulang
        ]);

        $input = $request->all();
        $slider->update($input);

        // image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = 'slider-'. $slider->id . '.jpg' ;
            $destinationPath = public_path('/imgfe/sliders');
            $image->move($destinationPath, $name);
            Slider::where('id', $slider->id)->update(array('image' => $name,));
        }

        activity()->event('slider-update')->log('slider id: '. $slider->id .' updated success');
        return redirect()->route('sliders.index')->with('success','Slider is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
