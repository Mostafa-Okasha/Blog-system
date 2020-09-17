<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
class CommentController extends Controller
{
    public function index()
    {
        $posts=Comment::get();
        return view('comments/index',compact('posts'));
    }
    public function show($id)
    {
        $post=Comment::where('id','=',$id)->first();
        return view('comments/show',compact('post'));
    }
    public function create()
    {
        //$post=Post::find($id);
        return view('comments/create');
    }
    public function store(Request $request)
    {
        $validator=\Validator::make($request->all(),
        [
            'title'=>'required|max:100|min:3',
            'desc'=>'required|max:100|min:3',
        ]);
        if($validator->fails())
        {
            return redirect('/comments/create')
            ->withErrors($validator)
            ->withInput();
        }
        //$com=new Post();
        $post=new Comment();
        $post->post_id=$request->id;
        $post->author=$request->title;
        $post->comment=$request->desc;
        $post->save();
        return redirect('/comments');
    }
    public function edit($id)
    {
        $post=Comment::find($id);
        return view('comments/edit',compact('post'));
    }
    public function update($id , Request $request)
    {
        //validation
        $validator=\Validator::make($request->all(),
        [
            'title'=>'required|max:100|min:3',
            'desc'=>'required|max:100|min:3',
        ]);
        if($validator->fails())
        {
            return redirect('/comments/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $post=Comment::find($id);
        $post->author=$request->title;
        $post->comment=$request->desc;
        $post->save();
        return redirect('comments/show/'.$id);
    }
    public function delete($id)
    {
        $post=Comment::find($id);
        $post->delete();
        return redirect('comments');
    }
}
