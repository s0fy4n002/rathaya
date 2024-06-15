<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
// use Auth;

use App\Models\Pic;
use App\Models\Firm;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Gender;

class MemberController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    public function index() //dashboard
    {
        // dd('member_index');
        $user = User::where('id',auth()->user()->id)->first();
        $pic  = Pic::where('user_id' ,auth()->user()->id)->first();
        $firm = Firm::where('user_id',auth()->user()->id)->first();
        // dd($datas);
        return view('fe.members.dashboard',compact('user','pic','firm'));
    }

    public function show()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $data  = Pic::where('user_id' ,auth()->user()->id)->first();

        if ($data){
            // dd('Ada : '.$data);
            $provinces = Province::where('id',$data->province_id)->get();
            $regencies = Regency::where('id',$data->regency_id)->get();
            $districts = District::where('id',$data->district_id)->get();
            $genders = Gender::where('id',$data->gender_id)->get();
            return view('fe.members.profile.show',compact('user','data','provinces','regencies','districts','genders'));
        }else{
            // dd('gak ada');
            // $provinces = Province::get();
            // $regencies = Regency::get();
            // $districts = District::get();
            // return redirect()->route('member_profile_create',compact('user','data','provinces','regencies','districts'));
            return redirect()->route('member_profile_create');
        }

        // dd($data);
        // return view('fe.members.profile.show',compact('user','data','provinces','regencies','districts'));
    }

    public function create()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $provinces = Province::get();
        $regencies = Regency::get();
        $districts = District::get();
        $genders = Gender::get();
        return view('fe.members.profile.create',compact('user','provinces','regencies','districts','genders'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'          => 'required|min:5',
            'idnumber'      => 'required|numeric|digits:16',
            'gender_id'     => 'required',
            'address'       => 'required|min:5',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'district_id'   => 'required',
            'villagename'   => 'required|min:3',
            'idphoto'       => 'mimes:jpeg,jpg|max:1024',
        ]);

        // dd($request->all());

        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['email'] = $user->email;
        $data = Pic::create($input);

        $destinationPath1 = public_path('/atr');
        $destinationPath2 = public_path('/imgpics');
        if ($request->hasFile('idphoto')){
            $image = $request->file('idphoto');
            $name1 = auth()->user()->id . '.jpg';
            $name2 = $ran . auth()->user()->id . '.jpg';
            $image->move($destinationPath1, auth()->user()->id . '.jpg');
            copy($destinationPath1.'/'.$name1, $destinationPath2.'/'.$name2);
            User::where('id', auth()->user()->id)->update(array('avatar' => $name1,));
            Pic::where('user_id', auth()->user()->id)->update(array('idphoto' => $name2,));
        }

        return redirect()->route('member_profile');
    }

    public function edit()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $data  = Pic::where('user_id' ,auth()->user()->id)->first();
        $provinces = Province::get();
        $regencies = Regency::where('province_id',$data->province_id)->get();
        $districts = District::where('regency_id',$data->regency_id)->get();
        $genders = Gender::get();
        return view('fe.members.profile.edit',compact('user','data','provinces','regencies','districts','genders'));
    }

    public function update(Request $request)
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
        ]);

        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;
        $pic = Pic::where('user_id',auth()->user()->id)->first();

        $pic->update([
            'name'     => $request->name,
            'gender_id'   => $request->gender_id,
            'idnumber'   => $request->idnumber,
            'address'   => $request->address,
            'province_id'   => $request->province_id,
            'regency_id'   => $request->regency_id,
            'district_id'   => $request->district_id,
            'villagename'   => $request->villagename,
        ]);

        $destinationPath1 = public_path('/atr');
        $destinationPath2 = public_path('/imgpics');
        if ($request->hasFile('idphoto')){
            $image = $request->file('idphoto');
            $name1 = auth()->user()->id . '.jpg';
            $name2 = $ran . auth()->user()->id . '.jpg';
            $image->move($destinationPath1, auth()->user()->id . '.jpg');
            copy($destinationPath1.'/'.$name1, $destinationPath2.'/'.$name2);
            User::where('id', auth()->user()->id)->update(array('avatar' => $name1,));
            Pic::where('user_id', auth()->user()->id)->update(array('idphoto' => $name2,));
        }

        return redirect()->route('member_profile');
    }
}
