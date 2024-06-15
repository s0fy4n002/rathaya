<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Pic;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::orderBy('id','DESC')->paginate(10);
        $users = User::orderBy('id','DESC')->get();
        // dd($users);
        // return view('be.users.index',compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);
        return view('be.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('be.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required',
            'avatar' => 'mimes:jpeg,jpg|max:1024|dimensions:min_width=100,min_height=100,max_width=320,max_height=320',
            ]
        );

        // dd($request->all());

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['ran'] = Str::uuid();
        $input['email_verified_at'] = '2000-01-01 00:00:00';

        try {
                $user = User::create($input);
                $user->assignRole($request->input('roles'));
                $lastId = $user->id;
                // dd($lastId);
            } catch(Exception $e) {
                dd($e->getMessage());
        }

        // avatar
        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            // $name = $image->getClientOriginalName();
            $name = $lastId . '.jpg';
            $destinationPath = public_path('/atr');
            $image->move($destinationPath, $name);
            User::where('id', $lastId)->update(array('avatar' => $name,));
        }

        activity()->event('user-store')->withProperties(['name' => $request->name])->log('user added success');
        return redirect()->route('users.index')->with('success','User -' . $request->name . '- is added successfully.');
    }

    public function show(string $id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = $user->roles->all();
        return view('be.users.show',compact('user','roles','userRole'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = $user->roles->all();
        return view('be.users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $name_old = $user->name;
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));

        // avatar
        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            // $name = $image->getClientOriginalName();
            $name = $user->id . '.jpg';
            $destinationPath = public_path('/atr');
            $image->move($destinationPath, $name);
            User::where('id', $user->id)->update(array('avatar' => $name,));
        }

        $record = Pic::where(['user_id'=>$user->id]);
        if ($record->exists()) {
            Pic::where('user_id', $user->id)->update(array('email' => $request->email,));
        }

        activity()->event('user-update')->withProperties(['id' => $user->id,'name' => $user->name,'id_old' => $user->id,'name_old' => $name_old])->log('user updated success');
        return redirect()->route('users.index')->with('success','User -' . $user->name . '- is updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        File::delete(public_path('/atr/').$user->id.'.jpg');
        activity()->event('user-delete')->withProperties(['name' => $user->name,'id' => $user->id])->log('user deleted success');
        return redirect()->route('users.index')->with('success', 'User -' . $user->name . '- is deleted successfully.');
    }
}
