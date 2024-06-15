<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Validation\ValidationException;

class MemberpasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit()
    {
        $data = User::where('id',auth()->user()->id);
        return view('fe.members.password.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'old_password'           => 'required|min:5',
            'password'               => 'required|same:password_confirmation|min:5',
            'password_confirmation'  => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $old_password = $request->old_password;


        if(Hash::check($old_password, $user->password)) {
            // They match
            // dd('cocok dan konfirmasi sama');
            $new_password = $request->password;
            $user->update([
                'password' => Hash::make($new_password),
            ]);

        } else {
            // dd('tidak cocok');
            throw ValidationException::withMessages(['old_password' => 'This value is incorrect']);
        }

        // dd($request->all());
        return redirect()->route('member_dashboard');
    }
}
