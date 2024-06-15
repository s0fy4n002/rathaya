<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pic;
use App\Models\User;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user_name = auth()->user()->name;
        // dd('auth nama : ' .$user_name);
        // $one2one = Pic::find(1)->user;
        // $one2one = Pic::find(2)->user->ran;
        // $one2one = Pic::where('id',2)->with('user')->get();
        // dd('hasil : ' .$one2one);
        // dd('auth nama : ' .$user_name . '<br>one2one : '.$one2one);
        $datas = Pic::orderBy('id','desc')->with('user')->paginate(10);
        return view('be.pics.index', ['datas' => $datas]);
    }

    public function create()
    {
        $userInPics = Pic::pluck('user_id')->all();
        // dd($userInPics);
        // $users = User::whereNotIn('id', $userInPics)->select('id','name')->get();
        $users = User::whereNotIn('id', $userInPics)->role('Member')->select('id','name')->get();
        // $users = User::orderBy('name','asc')->get();

        $genders = Gender::orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $districts = District::orderBy('id','asc')->get();
        return view('be.pics.create', compact('users','genders','provinces','regencies','districts'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'      => 'required|min:5',
            'gender_id' => 'required',
            'idnumber'  => 'required|min:16|max:16',
            'idphoto'   => 'mimes:jpeg,jpg|max:1024',
            'address'   => 'required|min:5',
            'province_id'  => 'required',
            'regency_id'  => 'required',
            'district_id'  => 'required',
            'villagename'      => 'required|min:3',
            'verification_id'  => 'required',
        ]);

        $user = User::find($request->user_id);
        $ran  = $user->ran;

        $input = $request->all();
        $input['email'] = $user->email;

        // dd($input);

        try {
                $data = Pic::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        $update_verify_profile = User::where('id', $request->user_id)->update(array('profile_verified' => $request->verification_id,));

        // idphoto
        if ($request->hasFile('idphoto')){
            $image = $request->file('idphoto');
            $name = $ran . $lastId . '.jpg';
            $destinationPath = public_path('/imgpics');
            $image->move($destinationPath, $name);
            Pic::where('id', $lastId)->update(array('idphoto' => $name,));
        }

        activity()->event('pic-store')->withProperties(['name' => $request->name])->log('pic added success');
        return redirect()->route('pics.index')->with('success','New PIC -' . $request->name . '- is added successfully.');

    }

    // public function show(string $id)
    public function show(Pic $pic)
    {
        $data = $pic;
        $users = User::orderBy('name','asc')->get();
        $genders = Gender::orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $districts = District::orderBy('id','asc')->get();
        return view('be.pics.show', compact('data','users','genders','provinces','regencies','districts'));
    }

    // public function edit(string $id)
    public function edit(Pic $pic)
    {
        $data = $pic;
        $users = User::orderBy('name','asc')->get();
        $genders = Gender::orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $districts = District::orderBy('id','asc')->get();
        return view('be.pics.edit', compact('data','users','genders','provinces','regencies','districts'));
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Pic $pic)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'      => 'required|min:5',
            'gender_id' => 'required',
            'idnumber'  => 'required|min:16|max:16',
            'idphoto'   => 'mimes:jpeg,jpg|max:1024',
            'address'   => 'required|min:5',
            'province_id'  => 'required',
            'regency_id'  => 'required',
            'district_id'  => 'required',
            'villagename'      => 'required|min:3',
            'verification_id'  => 'required',
        ]);


        $user = User::find($request->user_id);
        // dd($request->all());

        $input = $request->all();

        $old_name   = $pic->name;
        $new_name   = $input['name'];
        $old_idphoto = $pic->idphoto;
        $pic->update($input);

        $update_verify_profile = User::where('id', $request->user_id)->update(array('profile_verified' => $request->verification_id,));

        // idphoto
        $destinationPath = public_path('/imgpics');
        if ($request->hasFile('idphoto')){
            $image = $request->file('idphoto');
            $name = $old_idphoto;
            $image->move($destinationPath, $name);
            Pic::where('id', $pic->id)->update(array('idphoto' => $name,));
        }

        activity()->event('pic-update')->withProperties(['id' => $pic->id,'name' => $new_name,'id_old' => $pic->id,'name_old' => $old_name])->log('pic updated success');
        return redirect()->route('pics.index')->with('success','PIC -' . $new_name . '- is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
