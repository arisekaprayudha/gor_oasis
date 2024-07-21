<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
        //return view('setting.indexUser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('user.add',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make('12345678');
        $user->save();

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 1,
        ]);

        return redirect('/user')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.index',compact('bobot'));
        //return view('setting.viewUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        //dd($category);
        return view ('setting.editUser',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        if($request->password != $user->password){
        $user->password =  Hash::make($request->password);
        }
        $user->save();

        //return back();
        return redirect('/user')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('succes','success delete data');
    }

    public function updatePassword(Request $request)
    {

        // dd($request);
        //validate
        $request->validate([
            'password' => 'required',
            'newPassword' => ['required','confirmed'],
            // 'password_confirmation' => ['same:newPassword'],
        ]);
        // to check the old password

        // if(strcmp($request->get('password'), $request->get('newPassword')) == 0){
        // //Current password and new password are same
        // return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        // }
        
        // //jika password yang di input tidak sama dengan passsword yang ada di db
        // if (!(Hash::check($request->password, Auth::user()->password))) {
        //     // store the new password
        //     return redirect()->back()->with("error","Incorect password.");
        // }
        if (Hash::check($request->password, Auth::user()->password)) {
            // store the new password
            $request->user()->fill([
                'password' => Hash::make($request->newPassword)
            ])->save();
            return back();
        }
    }
}