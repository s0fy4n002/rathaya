<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Partner;

use App\Models\Firm;
use App\Models\Province;
use App\Models\Frontpage;
use App\Models\Howwework;
use App\Models\Slider;
use DB;

class FrontpageController extends Controller
{
    public function index()
    {
        $sql = 'SELECT a.id, a.name, a.photo1, a.name_slug, f.name AS firm_name, prv.short AS prv_name, kab.name AS kabkota_name
                    FROM (((`products` `a`
                        JOIN `firms` `f` ON ((`a`.`pic_id` = `f`.`pic_id` )))
                        JOIN `mw_1prv` `prv` ON (( `f`.`province_id` = `prv`.`id` )))
                        JOIN `mw_2kab` `kab` ON (( `f`.`regency_id` = `kab`.`id` )))
                    WHERE ( `a`.`f_active` = 1)
                    ORDER BY RAND()
                    LIMIT 5';
        $products = DB::select($sql);
        $partners = Partner::select('id', 'name' ,'logo','view')->inRandomOrder()->limit(5)->get();
        foreach ($partners as $p) {
            // echo $p->id;
            $p->increment('view',1);
            // $p->update(array('view' => $p->view+1));
        }
        $frontpage = Frontpage::orderBy('id', 'ASC')->first();
        $howweworks = Howwework::orderBy('nu', 'ASC')->where('f_active',1)->get();
        // dd($partners);
        // return view('fe.index',compact('partners'));
        // return view('fe.welcome');

        $sliders = Slider::orderBy('id', 'ASC')->where('f_active',1)->get();
        $slider = [
            [
                'title' => '1Bersama Gerakan Fungsi Lahan Gambut',
                'images' => 'slider-1.jpg'
            ],
            [
                'title' => '2Ini Contoh Judul Gambut',
                'images' => 'slider-2.jpg'
            ],
            // [
            //     'title' => '3Bersama Gerakan Fungsi Lahan Gambut',
            //     'images' => 'slider-2.jpg'
            // ],
        ];

        $data = [
            'sliders' => $sliders,
            'products' => $products,
            'partners' => $partners,
            'fp' => $frontpage,
            'howweworks' => $howweworks,
        ];

        return view('fe.index', $data);

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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
