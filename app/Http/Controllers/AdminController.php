<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
class AdminController extends Controller
{
    public function index()
    {
        $admins=Admin::get();
        return view('admins/index',compact('admins'));
    }
    public function show($id)
    {
        $admins=Admin::where('id','=',$id)->first();
        return view('admins/show',compact('admins'));
    }
    public function create()
    {
        return view('admins/create');
    }
    public function store(Request $request)
    {
        $validator=\Validator::make($request->all(),
        [
            'name'=>'required|max:100|min:3',
            'email'=>'required|email|max:100|min:3',
            'pass'=>'required|max:100|min:3',
            //'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails())
        {
            return redirect('/admins/create')
            ->withErrors($validator)
            ->withInput();
        }
        //image
        // if($request->hasFile('image'))
        // {
        //     $image=$request->file('image');
        //     $name=time().'_'.\Str::random(20).'.'.$image->
        //     getClientOriginalExtension();
        //     $destinationPath=public_Path('\images');
        //     $image->move($destinationPath,$name);
        //     $imageName='images/'.$name;
        // }
        $admins=new Admin();
        $admins->username=$request->name;
        $admins->email=$request->email;
        $admins->password=Hash::make($request->pass);
        //$admins->img=$imageName;
        $admins->save();
        return redirect('/admins');
    }
    public function edit($id)
    {
        $admins=Admin::find($id);
        return view('admins/edit',compact('admins'));
    }
    public function update($id , Request $request)
    {
        //validation
        $validator=\Validator::make($request->all(),
        [
            'name'=>'required|max:100|min:3',
            'email'=>'required|max:100|min:3',
            'pass'=>'required|max:100|min:3',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails())
        {
            return redirect('/admins/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $admins=Admin::find($id);
        $admins->username=$request->name;
        $admins->email=$request->email;
        //image
        // if($request->hasFile('image'))
        // {
        //     $image=$request->file('image');
        //     $name=time().'_'.\Str::random(20).'.'.$image->
        //     getClientOriginalExtension();
        //     $destinationPath=public_Path('\images');
        //     $image->move($destinationPath,$name);
        //     $imageName='images/'.$name;
        //     if(isset($post->img))
        //     {
        //         unlink($post->img);
        //     }
        //     $admins->img=$imageName;
        // }
        $admins->save();
        return redirect('admins/show/'.$id);
    }
    public function delete($id)
    {
        $admins=Admin::find($id);
        if(isset($admins->image))
        {
            unlink($admins->img);
        }
        $admins->delete();
        return redirect('admins');
    }
    public function login()
    {
        return view('admins/login');
    }
    public function handlelog(Request $request)
    {
        //validation
        $validator=\Validator::make($request->all(),
        [
            'email'=>'required|email|max:50|min:3',
            'pass'=>'required|max:300|min:3',
        ]);
        if($validator->fails())
        {
            return redirect('/admins/login')
            ->withErrors($validator)
            ->withInput();
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->pass]))
        {
            return redirect('/posts');
        }
            return redirect('/admins/login');
    }
}
