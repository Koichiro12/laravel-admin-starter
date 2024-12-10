<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __construct(){

    }
    public function index(){
        $data = User::findOrFail(auth()->user()->id);
        return view('pages.profile',compact(['data']));
    }
    public function update(Request $request){
        $oldData = User::findOrFail(auth()->user()->id);
        $validate = \Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        $password = $oldData->password;  
        if(isset($request->password) && $request->password != ''){
            $password = Hash::make($request->password);         
        }
        $image = $oldData->image;
        if($request->hasFile('image')){
            //Upload Image
            $uploadName = date('Ymdhis').$request->file('image')->getClientOriginalName();
            $uploadImage = $request->file('image')->move('uploads/img',$uploadName);
            $image = $uploadName;
            
            //Delete old image if exist
            if($oldData->image != '-'){
                unlink("uploads/image/".$oldData->image);
            }
        }
        $data = [
            'image' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ];
        if($oldData->update($data)){
            return redirect()->back()->with('success','Update Data SuccessFully');
        }
        return redirect()->back()->with('error','Oops, Something Went Wrong')->withInput();
    }
}
