<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Pic;
use App\Models\Commoditycat;
use App\Models\User;
use Illuminate\Support\Str; //untuk slug
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function delete_photo($id, $photonum)
    // public function delete_photo($id)
    {
        // dd('product_delete_photo');
        $destinationPath = public_path('/imgproducts');
        $product = Product::find($id);
        if ($photonum==4){
            if($product->photo4){
                $filename = $destinationPath.'/'.$product->photo4;
                if (is_file($filename)){
                    File::delete($filename);
                    $product->update(array('photo4' => '',));
                }

            }
        }
        if ($photonum==5){
            if($product->photo5){
                $filename = $destinationPath.'/'.$product->photo5;
                if (is_file($filename)){
                    File::delete($filename);
                    $product->update(array('photo5' => '',));
                }

            }
        }
        // return view('be.products.edit', ['data' => $product, 'pics' => $pics, 'commcats' => $commcats]);

        $pics = Pic::orderBy('name','asc')->get();
        $commcats = Commoditycat::where('f_active',1)->orderBy('name_len','asc')->get();

        activity()->event('product-delete_photo')->withProperties(['id' => $id,'name' => $product->name,'photo' => $photonum])->log('product photo deleted success');
        // return view('be.products.edit', ['data' => $product, 'pics' => $pics, 'commcats' => $commcats]);

        return view('be.products.edit', ['data' => $product, 'pics' => $pics, 'commcats' => $commcats]);
        // return redirect()->route('products.edit')->with('success','Product photo -' . $product->name . '- is deleted successfully.');
        // return redirect()->route('products.index')->with('success','Product Photo -' . $product->name . '- is deleted successfully.');

    }

    public function index()
    {
        // $datas = Product::orderBy('id','desc')->paginate(10);
        // $datas = Product::orderBy('id','desc')->get();
        $datas = Product::with('pic')->orderBy('id','desc')
                    ->select('id', 'user_id', 'pic_id', 'name', 'priceretailer', 'pricewholesaler', 'f_active')->get();
        // dd($datas);
        return view('be.products.index', ['datas' => $datas]);
    }

    public function create()
    {
        $pics = Pic::orderBy('name','asc')->get();
        $commcats = Commoditycat::where('f_active',1)->orderBy('name_len','asc')->get();
        return view('be.products.create', compact('pics','commcats'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $getUser = Pic::find($request->pic_id)->user; // get user fro, PIC
        $kode = substr($getUser->ran, 0, 4);
        $user_id = $getUser->id;
        $slug = Str::slug($request->name).'-'.$kode;
        // dd($request->all());

        $this->validate($request, [
            'pic_id'     => 'required',
            'name'      => 'required|min:5',
            'priceretailer'         => 'required|numeric|min:0',
            'avgsoldmonth'          => 'required|numeric|min:0',
            'pricewholesaler'       => 'required|numeric|min:0',
            'minpurchasewholesaler' => 'required|numeric|min:0',
            'description_lid'       => 'required|min:3',
            'description_len'       => 'required|min:3',
            'commoditycat_id'       => 'required',
            'photo1'    => 'mimes:jpeg,jpg|max:1024',
            'photo2'    => 'mimes:jpeg,jpg|max:1024',
            'photo3'    => 'mimes:jpeg,jpg|max:1024',
            'photo4'    => 'mimes:jpeg,jpg|max:1024',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = $user_id;
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
        // photo2
        if ($request->hasFile('photo2')){
            $image = $request->file('photo2');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '2.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo2' => $name,));
        }
        // photo3
        if ($request->hasFile('photo3')){
            $image = $request->file('photo3');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '3.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo3' => $name,));
        }
        // photo4
        if ($request->hasFile('photo4')){
            $image = $request->file('photo4');
            $name = Str::slug($request->name) .'-'. $kode .'-'. $lastId .'-'. '4.jpg';
            $image->move($destinationPath, $name);
            Product::where('id', $lastId)->update(array('photo4' => $name,));
        }

        activity()->event('product-store')->withProperties(['name' => $request->name])->log('product added success');
        return redirect()->route('products.index')->with('success','New product -' . $request->name . '- is added successfully.');
    }

    // public function show(string $id)
    public function show(Product $product)
    {
        $pics = Pic::orderBy('name','asc')->get();
        $commcats = Commoditycat::orderBy('id','asc')->get();

        return view('be.products.show', ['data' => $product, 'pics' => $pics, 'commcats' => $commcats]);
    }

    // public function edit(string $id)
    public function edit(Product $product)
    {
        $pics = Pic::orderBy('name','asc')->get();
        $commcats = Commoditycat::where('f_active',1)->orderBy('name_len','asc')->get();

        return view('be.products.edit', ['data' => $product, 'pics' => $pics, 'commcats' => $commcats]);
    }

    // public function update(Request $request, string $id)
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $getUser = Pic::find($request->pic_id)->user;
        // $kode = substr(User::find($request->user_id)->ran, 0, 4);
        $kode = substr($getUser->ran, 0, 4);

        $old_photo1 = $product->photo1;
        $old_photo2 = $product->photo2;
        $old_photo3 = $product->photo3;
        $old_photo4 = $product->photo4;

        if ($old_photo4==''){
            // dd('$old_photo4 : '.$old_photo4);
            $old_photo4 = Str::slug($request->name) .'-'. $kode .'-'. $product->id . '4.jpg';
        }
        // dd($old_photo4);
        $old_photo5 = $product->photo5;
        if ($old_photo5==''){
            // dd('$old_photo4 : '.$old_photo4);
            $old_photo5 = Str::slug($request->name) .'-'. $kode .'-'. $product->id . '5.jpg';
        }

        $this->validate($request, [
            'name'      => 'required|min:5',
            'priceretailer'         => 'required|numeric|min:0',
            'avgsoldmonth'          => 'required|numeric|min:0',
            'pricewholesaler'       => 'required|numeric|min:0',
            'minpurchasewholesaler' => 'required|numeric|min:0',
            'description_lid'       => 'required|min:3',
            'description_len'       => 'required|min:3',
            'commoditycat_id'       => 'required',
            'photo1'    => 'mimes:jpeg,jpg|max:1024',
            'photo2'    => 'mimes:jpeg,jpg|max:1024',
            'photo3'    => 'mimes:jpeg,jpg|max:1024',
            'photo4'    => 'mimes:jpeg,jpg|max:1024',
            'photo5'    => 'mimes:jpeg,jpg|max:1024',
            'f_active'  => 'required',
        ]);

        $input = $request->all();
        $old_name   = $product->name;
        $new_name   = $input['name'];

        $product->update($input);

        // photo1
        $destinationPath = public_path('/imgproducts');
        if ($request->hasFile('photo1')){
            $image = $request->file('photo1');
            $name = $old_photo1;
            $image->move($destinationPath, $name);
            Product::where('id', $product->id)->update(array('photo1' => $name,));
        }
        // photo2
        if ($request->hasFile('photo2')){
            $image = $request->file('photo2');
            $name = $old_photo2;
            $image->move($destinationPath, $name);
            Product::where('id', $product->id)->update(array('photo2' => $name,));
        }
        // photo3
        if ($request->hasFile('photo3')){
            $image = $request->file('photo3');
            $name = $old_photo3;
            $image->move($destinationPath, $name);
            Product::where('id', $product->id)->update(array('photo3' => $name,));
        }
        // photo4
        if ($request->hasFile('photo4')){
            $image = $request->file('photo4');
            $name = $old_photo4;
            $image->move($destinationPath, $name);
            Product::where('id', $product->id)->update(array('photo4' => $name,));
        }
        // photo5
        if ($request->hasFile('photo5')){
            $image = $request->file('photo5');
            $name = $old_photo5;
            $image->move($destinationPath, $name);
            Product::where('id', $product->id)->update(array('photo5' => $name,));
        }

        activity()->event('product-update')->withProperties(['id' => $product->id,'name' => $new_name,'id_old' => $product->id,'name_old' => $old_name])->log('product updated success');
        return redirect()->route('products.index')->with('success','Product -' . $new_name . '- is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('destroy product');
    }
}
