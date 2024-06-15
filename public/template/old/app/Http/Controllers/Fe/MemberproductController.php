<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commoditycat;
use App\Models\Pic;
use App\Models\Firm;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str; //untuk slug
use Illuminate\Support\Facades\File;

class MemberproductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $pic  = Pic::where('user_id' ,auth()->user()->id)->first();
        $firm = Firm::where('user_id',auth()->user()->id)->first();

        // cek sudah ada pic dan firm
        // if($pic == null or $firm == null){
        //     return redirect()->route('member_dashboard');
        // }

        // cek sudah ada pic dan firm
        if($pic == null or $pic->verification_id == 0){
            return redirect()->route('member_dashboard');
        }

        if($firm == null or $firm->verification_id == 0){
            return redirect()->route('member_dashboard');
        }

        $datas = Product::where('user_id',auth()->user()->id)->get();

        return view('fe.members.products.index',compact('datas'));
    }

    public function create()
    {
        $commoditycats = Commoditycat::orderBy('name_lid','asc')->get();
        return view('fe.members.products.create',compact('commoditycats'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'                  => 'required|min:5',
            'priceretailer'         => 'required|numeric|min:0',
            'avgsoldmonth'          => 'required|numeric|min:0',
            'pricewholesaler'       => 'required|numeric|min:0',
            'minpurchasewholesaler' => 'required|numeric|min:0',
            'description_lid'       => 'required|min:3',
            'description_len'       => 'required|min:3',
            'commoditycat_id'       => 'required',
            'photo1'                => 'required|mimes:jpeg,jpg|max:1024',
            'photo2'                => 'required|mimes:jpeg,jpg|max:1024',
            'photo3'                => 'required|mimes:jpeg,jpg|max:1024',
            'photo4'                => 'mimes:jpeg,jpg|max:1024',
        ]);

        // dd($request->all());

        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;
        $kode = substr($ran, 0, 4);

        $pic  = Pic::where('user_id',auth()->user()->id)->first();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['pic_id'] = $pic->id;
        try {
                $data = Product::create($input);
                $lastId = $data->id;
                $slug = Str::slug($request->name).'-'.substr($user->ran, 0, 4).$lastId;
                Product::where('id', $lastId)->update(array('name_slug' => $slug,));
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        // photo
        $destinationPath = public_path('/imgproducts');
        if ($request->hasFile('photo1')){
            $image = $request->file('photo1');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '1.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo1' => $name,));
        }
        if ($request->hasFile('photo2')){
            $image = $request->file('photo2');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '2.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo2' => $name,));
        }
        if ($request->hasFile('photo3')){
            $image = $request->file('photo3');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '3.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo3' => $name,));
        }
        if ($request->hasFile('photo4')){
            $image = $request->file('photo4');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '4.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo4' => $name,));
        }

        return redirect()->route('member_product_index');
    }

    public function show(string $id)
    {
        $data = Product::where('id',$id)->where('user_id',auth()->user()->id)->first();
        $commoditycats = Commoditycat::where('id',$data->commoditycat_id)->get();
        return view('fe.members.products.show',compact('data','commoditycats'));
    }

    public function edit(string $id)
    {
        $data = Product::where('id',$id)->where('user_id',auth()->user()->id)->first();
        $commoditycats = Commoditycat::orderBy('name_lid','asc')->get();
        return view('fe.members.products.edit',compact('data','commoditycats'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'                  => 'required|min:5',
            'priceretailer'         => 'required|numeric|min:0',
            'avgsoldmonth'          => 'required|numeric|min:0',
            'pricewholesaler'       => 'required|numeric|min:0',
            'minpurchasewholesaler' => 'required|numeric|min:0',
            'description_lid'       => 'required|min:3',
            'description_len'       => 'required|min:3',
            'commoditycat_id'       => 'required',
            'photo1'                => 'mimes:jpeg,jpg|max:1024',
            'photo2'                => 'mimes:jpeg,jpg|max:1024',
            'photo3'                => 'mimes:jpeg,jpg|max:1024',
            'photo4'                => 'mimes:jpeg,jpg|max:1024',
        ]);

        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $ran  = $user->ran;
        $data = Product::where('id',$id)->where('user_id',auth()->user()->id)->first();

        if ($data->photo1){
                $old_photo1 = $data->photo1;
            }else{
                $kode = substr($ran, 0, 4);
                $old_photo1 = Str::slug($request->name) .'-'. $kode .'-'. $data->id .'-'. '1.jpg';
        }
        if ($data->photo2){
                $old_photo2 = $data->photo2;
            }else{
                $kode = substr($ran, 0, 4);
                $old_photo2 = Str::slug($request->name) .'-'. $kode .'-'. $data->id .'-'. '2.jpg';
        }
        if ($data->photo3){
                $old_photo3 = $data->photo3;
            }else{
                $kode = substr($ran, 0, 4);
                $old_photo3 = Str::slug($request->name) .'-'. $kode .'-'. $data->id .'-'. '3.jpg';
        }

        if ($data->photo4){
                // dd('ada isi field photo4');
                $old_photo4 = $data->photo4;
            }else{
                // dd('kosong isi field photo4');
                $kode = substr($ran, 0, 4);
                $old_photo4 = Str::slug($request->name) .'-'. $kode .'-'. $data->id .'-'. '4.jpg';
                // dd('kosong : '.$old_photo4);
        }

        // dd($data);
        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['pic_id'] = $data->pic_id;
        $data->update($input);
        // dd($old_photo1);

        // photos
        $destinationPath = public_path('/imgproducts');
        if ($request->hasFile('photo1')){
            $image = $request->file('photo1');
            $name1 = $old_photo1;
            // $destinationPath = public_path('/imgproducts');
            $image->move($destinationPath, $name1);
            Product::where('id',$id)->where('user_id', auth()->user()->id)->update(array('photo1' => $name1,));
        }
        if ($request->hasFile('photo2')){
            $image = $request->file('photo2');
            $name2 = $old_photo2;
            // $destinationPath = public_path('/imgproducts');
            $image->move($destinationPath, $name2);
            Product::where('id',$id)->where('user_id', auth()->user()->id)->update(array('photo2' => $name2,));
        }
        if ($request->hasFile('photo3')){
            $image = $request->file('photo3');
            $name3 = $old_photo3;
            // $destinationPath = public_path('/imgproducts');
            $image->move($destinationPath, $name3);
            Product::where('id',$id)->where('user_id', auth()->user()->id)->update(array('photo3' => $name3,));
        }
        if ($request->hasFile('photo4')){
            $image = $request->file('photo4');
            $name4 = $old_photo4;
            $image->move($destinationPath, $name4);
            Product::where('id',$id)->where('user_id', auth()->user()->id)->update(array('photo4' => $name4,));
        }

        return redirect()->route('member_product_show',['id' => $id]);

    }

    public function delete(string $id, $photo)
    {
        // dd('Hapus : '.$photo.' dengan id : '.$id);
        $data = Product::where('id',$id)->where('user_id',auth()->user()->id)->first();
        $field_content = $data->$photo;
        $field_name = $photo;

        // dd($field_name);
        // hapus file
        // kosongin field
        File::delete(public_path('/imgproducts/').$field_content);
        $data->update(array($photo => '',));

        return redirect()->route('member_product_edit',['id' => $id]);
    }
}
