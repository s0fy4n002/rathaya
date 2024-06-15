<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Pic;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Enabler;
use App\Models\Partner;


class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::find(auth()->id());
        $roles = Role::get();
        $userRole = $user->roles->all();

        $pics = Pic::count();
        $firms = Firm::count();
        $products = Product::count();
        $enablers = Partner::count();
        $partners = Partner::count();
        $users = User::count();

        // return view('be.dashboard');
        // return view('be.dashboard',compact('user','roles','userRole'));
        return view('be.dashboard.dashboard',compact('user','roles','userRole','pics','firms','products','partners','enablers','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
