<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Firm;
use App\Models\Pic;
use App\Models\Bentity;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Tovercat;
use App\Models\Invneed;
use App\Models\User;
use Illuminate\Support\Str; //untuk slug
use App\Models\Firminv;

class FirmController extends Controller
{
    public function index()
    {
        $datas = Firm::orderBy('id','desc')->paginate(10);
        return view('be.firms.index', ['datas' => $datas]);
    }

    public function create()
    {
        $picInFirms = Firm::pluck('pic_id')->all();
        // dd($picInFirms);
        $pics = Pic::whereNotIn('id', $picInFirms)->orderBy('name','asc')->get();

        $bentities = Bentity::orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $tovercats = Tovercat::orderBy('id','asc')->get();
        $invneeds  = Invneed::orderBy('id','asc')->get();
        return view('be.firms.create', compact('pics','bentities','provinces','regencies','tovercats','invneeds'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $getUser = Pic::find($request->pic_id)->user; // get user fro, PIC
        $kode = substr($getUser->ran, 0, 4);
        $user_id = $getUser->id;
        $slug = Str::slug($request->name).'-'.$kode;

        $this->validate($request, [
            'name'              => 'required|min:5',
            'bentity_id'        => 'required',
            'wanumber'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'established'       => 'required|min:4',
            'area'              => 'required|min:0',
            'employee'          => 'required|min:0',
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
            'verification_id'   => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = $user_id;
        $input['name_slug'] = $slug;
        try {
                $data = Firm::create($input);
                $lastId = $data->id;
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        // sub tabel firminv
        // $user_id = $request->user_id;
        $pic_id = $request->pic_id;
        $firm_id = $lastId;
        // $firm_id = 2;
        $firminvs = $request->input('firminv');

        // dd($firminvs);
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
            // $name = Str::slug($request->name) .'-'. $kode .'pcbh_pantaugambut-'. $lastId . '.jpg';
            $name = Str::slug($request->name) .'-pcbh_pantaugambut-'. $lastId . '.jpg';
            $destinationPath = public_path('/imgfirms');
            $image->move($destinationPath, $name);
            Firm::where('id', $lastId)->update(array('photo' => $name,));
        }
        // pdf
        if ($request->hasFile('document')){
            $image = $request->file('document');
            // $name = Str::slug($request->name) .'-'. $kode .'pcbh_pantaugambut-'. $lastId . '.pdf';
            $name = Str::slug($request->name) .'-pcbh_pantaugambut-'. $lastId . '.pdf';
            $destinationPath = public_path('/pdffirms');
            $image->move($destinationPath, $name);
            Firm::where('id', $lastId)->update(array('document' => $name,));
        }

        activity()->event('business-store')->withProperties(['name' => $request->name])->log('busines added success');
        return redirect()->route('firms.index')->with('success','New business -' . $request->name . '- is added successfully.');
    }

    // public function show(string $id)
    public function show(Firm $firm)
    {
        $data = $firm;
        $pics = Pic::orderBy('name','asc')->get();
        $bentities = Bentity::orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $tovercats = Tovercat::orderBy('id','asc')->get();
        $invneeds  = Invneed::orderBy('id','asc')->get();
        $selectedInvneeds = Firminv::where('firm_id',$firm->id)->pluck('invneed_id')->toArray();
        return view('be.firms.show', compact('data','pics','bentities','provinces','regencies','tovercats','invneeds','selectedInvneeds'));
    }

    public function edit(string $id)
    {
        $data = Firm::find($id);
        $pics = Pic::orderBy('name','asc')->get();
        $bentities = Bentity::where('f_active',1)->orderBy('id','asc')->get();
        $provinces = Province::orderBy('id','asc')->get();
        $regencies = Regency::orderBy('id','asc')->get();
        $tovercats = Tovercat::where('f_active',1)->orderBy('id','asc')->get();
        $invneeds  = Invneed::where('f_active',1)->orderBy('id','asc')->get();
        $selectedInvneeds = Firminv::where('firm_id',$id)->pluck('invneed_id')->toArray();

        return view('be.firms.edit', compact('data','pics','bentities','provinces','regencies','tovercats','invneeds','selectedInvneeds'));
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Firm $firm)
    {
        // hapus by firm_id lalu create baru. karena firminv gak nyimpan status ya atau tidak di firminv_id
        // dd($request->all());
        // dd($firm);

        $old_data = $firm;
        // dd($old_data->pic_id);

        $this->validate($request, [
            'name'              => 'required|min:5',
            'bentity_id'        => 'required',
            'wanumber'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'established'       => 'required|min:4',
            'area'              => 'required|min:0',
            'employee'          => 'required|min:0',
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
            'verification_id'   => 'required',
        ]);

        // dd($request->all());

        $input          = $request->all();
        $pic_id         = $old_data->pic_id;
        $old_name       = $firm->name;
        $new_name       = $input['name'];
        $old_photo      = $firm->photo;
        $old_document   = $firm->document;
        $firm->update($input);

        // dd($input);
        // dd($request->input('pic_id'));

        $firminv = Firminv::where('pic_id',$pic_id);
        // dd($firminv);
        $firminv->delete();

        // sub tabel firminv
        $user_id = $request->input('user_id');
        $pic_id = $pic_id;
        $firm_id = $firm->id;
        // dd($firm_id);

        $firminvs = $request->input('firminv');
        foreach($firminvs as $firminv){
            $postFirminv = Firminv::create([
                'user_id' => $user_id,
                'pic_id' => $pic_id,
                'firm_id' => $firm_id,
                'invneed_id' => $firminv,
            ]);
        }

        $update_verify_phone = User::where('id', $request->user_id)->update(array('phone_verified' => $request->verification_id,));
        // dd($pic_id);
        // pdf
        if ($request->hasFile('document')){
            $image = $request->file('document');
            $name = $old_document;
            $destinationPath = public_path('/pdffirms');
            $image->move($destinationPath, $name);
            Firm::where('id', $pic_id)->update(array('document' => $name,));
        }
        //photo
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $name_photo = $old_photo;
            // dd($name);
            $destinationPath = public_path('/imgfirms');
            $image->move($destinationPath, $name_photo);
            Firm::where('id', $pic_id)->update(array('photo' => $name_photo,));
        }

        // dd('ujung');

        activity()->event('business-update')->withProperties(['id' => $firm->id,'name' => $new_name,'id_old' => $firm->id,'name_old' => $old_name])->log('business updated success');
        return redirect()->route('firms.index')->with('success','Business -' . $new_name . '- is updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
