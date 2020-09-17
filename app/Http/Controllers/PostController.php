<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts=Post::get();
        return view('posts/index',compact('posts'));
    }
    public function show($id)
    {
        $post=Post::where('id','=',$id)->first();
        return view('posts/show',compact('post'));
    }
    public function create()
    {
        return view('posts/create');
    }
    public function store(Request $request)
    {
        $validator=\Validator::make($request->all(),
        [
            'title'=>'required|max:100|min:3',
            'desc'=>'required|max:100|min:3',
            'content'=>'required|max:100|min:3',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails())
        {
            return redirect('/posts/create')
            ->withErrors($validator)
            ->withInput();
        }
        //image
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $name=time().'_'.\Str::random(20).'.'.$image->
            getClientOriginalExtension();
            $destinationPath=public_Path('\images');
            $image->move($destinationPath,$name);
            $imageName='images/'.$name;
        }
        $post=new Post();
        $post->user_id=\Auth::user()->id;
        $post->title=$request->title;
        $post->desc=$request->desc;
        $post->content=$request->content;
        $post->img=$imageName;
        $post->save();
        return redirect('/posts');
    }
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts/edit',compact('post'));
    }
    public function update($id , Request $request)
    {
        //validation
        $validator=\Validator::make($request->all(),
        [
            'title'=>'required|max:100|min:3',
            'desc'=>'required|max:100|min:3',
            'content'=>'required|max:100|min:3',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails())
        {
            return redirect('/posts/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $post=Post::find($id);
        $post->title=$request->title;
        $post->desc=$request->desc;
        $post->content=$request->content;
        //image
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $name=time().'_'.\Str::random(20).'.'.$image->
            getClientOriginalExtension();
            $destinationPath=public_Path('\images');
            $image->move($destinationPath,$name);
            $imageName='images/'.$name;
            if(isset($post->img))
            {
                unlink($post->img);
            }
            $post->img=$imageName;
        }
        $post->save();
        return redirect('posts/show/'.$id);
    }
    public function delete($id)
    {
        $post=Post::find($id);
        if(isset($post->image))
        {
            unlink($post->img);
        }
        $post->delete();
        return redirect('posts');
    }
}
