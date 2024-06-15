<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Firm;
use App\Models\Firminv;
use App\Models\Firmweb;
use App\Models\Bentity;;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Tovercat;
use App\Models\Invneed;
use App\Models\Webcat;
use App\Models\Pic;
use Illuminate\Support\Str;

class MemberfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $data = Firm::where('user_id' ,auth()->user()->id)->first();
        // dd($data);
        if ($data){
            // dd('Ada : '.$data);
            $bentities = Bentity::where('id',$data->bentity_id)->get();
            $tovercats = Tovercat::where('id',$data->turnovercat_id)->get();
            $provinces = Province::where('id',$data->province_id)->get();
            $regencies = Regency::where('id',$data->regency_id)->get();
            $invneeds  = Invneed::orderBy('id','asc')->get();
            $selectedInvneeds = Firminv::where('firm_id',$data->id)->pluck('invneed_id')->toArray();
            return view('fe.members.firm.show',compact('data','bentities','provinces','regencies','tovercats','invneeds','selectedInvneeds'));
        }else{
            // dd('gak ada');
            return redirect()->route('member_firm_create');
        }
    }

    public function create()
    {
        // cek sudah ada pic
        $pic  = Pic::where('user_id' ,auth()->user()->id)->first();
        if($pic == null){
            return redirect()->route('member_profile_create');
        }

        $user = User::where('id',auth()->user()->id)->first();
        $bentities = Bentity::get();
        $tovercats = Tovercat::get();
        $provinces = Province::get();
        $regencies = Regency::get();
        $invneeds  = Invneed::orderBy('id','asc')->get();
        $webcats   = Webcat::orderBy('id','asc')->get();
        return view('fe.members.firm.create',compact('user','bentities','tovercats','provinces','regencies','invneeds','webcats'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
                'name'              => 'required|min:5',
                'bentity_id'        => 'required',
                'wanumber'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
                'address'           => 'required|min:5',
                'province_id'       => 'required',
                'regency_id'        => 'required',
                'established'       => 'required|min:4|max:4',
                'area'              => 'required|numeric|min:0',
                'employee'          => 'required|numeric|min:0',
                'turnovercat_id'    => 'required',
                'firminv'           => 'required',
                'urlweb'            => 'required|min:5',
                'urlmedsos'         => 'required|min:5',
                'urlmarket1'        => 'required|min:5',
                'urlmarket2'        => 'required|min:5',
                'photo'             => 'required|mimes:jpeg,jpg|max:1024', // 1 mb
                'document'          => 'required|mimes:pdf|max:20240', // 20 mbpdf
                'description_lid'   => 'required|min:5',
                'description_len'   => 'required|min:5',
            ]);
        // dd($request->all());

        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;
        $slug = Str::slug($request->name).'-'.substr($user->ran, 0, 4);
        // dd($slug);

        $pic = Pic::where('user_id',$user->id)->first();
        // dd($pic->id);

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['pic_id'] = $pic->id;
        $input['name_slug'] = $slug;
        try {
                $data = Firm::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        $kode = substr($user->ran, 0, 4);
        $user_id = $user->id;


        $pic_id = $pic->id;
        $firm_id = $lastId;

        $firminvs = $request->input('firminv');

        foreach($firminvs as $firminv){
            $postFirminv = Firminv::create([
                'user_id' => $user_id,
                'pic_id' => $pic_id,
                'firm_id' => $firm_id,
                'invneed_id' => $firminv,
            ]);
        }

        // photo
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = Str::slug($request->name) .'-pcbh_pantaugambut-'. $lastId . '.jpg';
            $destinationPath = public_path('/imgfirms');
            $image->move($destinationPath, $name);
            Firm::where('id', $lastId)->update(array('photo' => $name,));
        }
        // pdf
        if ($request->hasFile('document')){
            $image = $request->file('document');
            $name = Str::slug($request->name) .'-pcbh_pantaugambut-'. $lastId . '.pdf';
            $destinationPath = public_path('/pdffirms');
            $image->move($destinationPath, $name);
            Firm::where('id', $lastId)->update(array('document' => $name,));
        }

        return redirect()->route('member_firm');

    }

    public function edit()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $data = Firm::where('user_id' ,auth()->user()->id)->first();
        $bentities = Bentity::get();
        $tovercats = Tovercat::get();
        $provinces = Province::get();
        $regencies = Regency::where('province_id',$data->province_id)->get();
        $invneeds  = Invneed::orderBy('id','asc')->get();
        $selectedInvneeds = Firminv::where('firm_id',$data->id)->pluck('invneed_id')->toArray();
        return view('fe.members.firm.edit',compact('data','bentities','provinces','regencies','tovercats','invneeds','selectedInvneeds'));

    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'              => 'required|min:5',
            'bentity_id'        => 'required',
            'wanumber'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'established'       => 'required|min:4|max:4',
            'area'              => 'required|numeric|min:0',
            'employee'          => 'required|numeric|min:0',
            'turnovercat_id'    => 'required',
            'firminv'           => 'required',
            'urlweb'            => 'required|min:5',
            'urlmedsos'         => 'required|min:5',
            'urlmarket1'        => 'required|min:5',
            'urlmarket2'        => 'required|min:5',
            'photo'             => 'mimes:jpeg,jpg|max:1024', // 1 mb
            'document'          => 'mimes:pdf|max:20240', // 20 mbpdf
            'description_lid'   => 'required|min:5',
            'description_len'   => 'required|min:5',
        ]);
        // dd($request->all());

        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;
        $data = Firm::where('user_id' ,auth()->user()->id)->first();
        $pic_id  = $data->pic_id;
        $old_photo      = $data->photo;
        $old_document   = $data->document;

        // $data->update([
        //     'name'     => $request->name,
        //     'bentity_id'   => $request->bentity_id,
        //     'wanumber'   => $request->wanumber,
        //     'province_id'   => $request->province_id,
        //     'regency_id'   => $request->regency_id,
        //     'established'   => $request->established,
        //     'area'   => $request->area,
        //     'employee'   => $request->employee,
        //     'turnovercat_id'   => $request->turnovercat_id,
        //     'urlweb'   => $request->urlweb,
        //     'urlmedsos'   => $request->urlmedsos,
        //     'urlmarket1'   => $request->urlmarket1,
        //     'urlmarket2'   => $request->urlmarket2,
        //     'description_lid'   => $request->description_lid,
        //     'description_len'   => $request->description_len,
        // ]);

        $input = $request->all();
        $data->update($input);

        $firminv = Firminv::where('pic_id',$pic_id);
        // dd($firminv);
        $firminv->delete();

        // sub tabel firminv
        $user_id = auth()->user()->id;
        // $pic_id = $pic_id;
        $firm_id = $data->id;

        $firminvs = $request->input('firminv');
        foreach($firminvs as $firminv){
            $postFirminv = Firminv::create([
                'user_id' => $user_id,
                'pic_id' => $pic_id,
                'firm_id' => $firm_id,
                'invneed_id' => $firminv,
            ]);
        }

        // pdf
        if ($request->hasFile('document')){
            $pdf = $request->file('document');
            $name = $old_document;
            // dd($name);
            $destinationPath = public_path('/pdffirms');
            $pdf->move($destinationPath, $name);
            Firm::where('user_id', auth()->user()->id)->update(array('document' => $name,));
        }

        //photo
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = $old_photo;
            $destinationPath = public_path('/imgfirms');
            $image->move($destinationPath, $name);
            Firm::where('user_id', auth()->user()->id)->update(array('photo' => $name,));
        }
        return redirect()->route('member_firm');
    }

}
