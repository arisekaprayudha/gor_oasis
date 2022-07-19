<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UnitKerja;
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
        // return User::with(['role'])->get();
        $user = User::all();
        $unitkerja = UnitKerja::all();

        return view('setting.indexUser', compact('user','unitkerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitkerja = UnitKerja::all();
        return view('setting.addUser', compact('unitkerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create([
            'name' => $request['name'],
            'nip' => $request['nip'],
            //'email' => $data['email'],
            //'password' => Hash::make($data['password']),
            'password' => Hash::make('hris9090')
        ]);

        // User::insert([
        //     'name' =>$request->get('name'),
        //     'nip' =>$request->get('nip')
        // ])

        // $user = User::create($request->all());
        // $user->roles()->sync($request->input('roles', []));

        // return redirect()->route('admin.users.index');
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
        $unitkerja = UnitKerja::all();
        $user = User::find($id);
        return view('setting.viewUser', compact('user','unitkerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitkerja = UnitKerja::all();
        $user = User::findorfail($id);
        //dd($category);
        return view ('setting.editUser',compact('user','unitkerja'));
        
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
        //
        $user = User::findorfail($id);
        // $request->user()->fill([
        //     'password' => Hash::make($request->password)
        // ])->save();


        // user::create([
        //     'name' => $request->name,
        //     'nip' => $request->nip,
        //     'password' => Hash::make($request->password)
        // ]);
        // $newpassword =  Hash::make($request->password);
        // $user->name = $request->name;
        // $user->nip = $request->nip;
        // $user->password = $newpassword;
        // $user->save;
        $request->user()->fill([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password)
        ])->save();

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