<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MessageController extends Controller
{
    public function message()
    {
        return view('/messages/messageform');
    }
    public function store(Request $request)
    {
        //validation
        $validator=\Validator::make($request->all(),
        [
            'name'=>'required|max:100|min:3',
            'email'=>'required|email|max:100|min:3',
            'phone'=>'required|numeric',
            'message'=>'required|max:400|min:3',
        ]);
        if($validator->fails())
        {
            return redirect('/messages/message')
            ->withErrors($validator)
            ->withInput();
        }
        $message=new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->phone=$request->phone;
        $message->message=$request->message;
        $message->save();
        return redirect('/messages/message');
    }
}
