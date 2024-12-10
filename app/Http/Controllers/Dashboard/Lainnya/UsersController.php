<?php

namespace App\Http\Controllers\Dashboard\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::latest()->get();
        return view('pages.users.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $image = '-';
        if($request->hasFile('image')){
            $uploadName = $request->file('image')->getClientOriginalName();
            $upload = $request->file('image')->move('uploads/img',$uploadName);
            $image = $uploadName;
        }
        $create = User::insertGetId([
            'image' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        
        if($create){
           
            return redirect()->route('pengguna.index')->with('success','Insert Data SuccessFully');
        }
        return redirect()->back()->with('error','Oops, Something Went Wrong')->withInput();
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
        $data = User::findOrFail($id);
        return view('pages.users.form',compact(['data','id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $oldData = User::findOrFail($id);
        $validate = \Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $image = $oldData->image;
        $password = $oldData->password;
        if($request->hasFile('image')){
            $uploadName = $request->file('image')->getClientOriginalName();
            $upload = $request->file('image')->move('uploads/img',$uploadName);
            $image = $uploadName;
        }
        if(isset($request->password) && $request->password != ''){
            $password = Hash::make($request->password);
        }
        $data = [
            'image' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role
        ];
          
        if($oldData->update($data)){
            return redirect()->route('pengguna.index')->with('success','Update Data SuccessFully');
        }
        return redirect()->back()->with('error','Oops, Something Went Wrong')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = User::findOrFail($id);
        $oldData->delete();
        return redirect()->route('pengguna.index')->with('success','Delete Data SuccessFully');
    }
}
