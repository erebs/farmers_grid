<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function chats(){
        $header="chat";
        $chats = Chat::where('sender', '!=', 'admin')
    ->orderBy('view_status', 'ASC')
    ->latest()
    ->groupBy('sender')
    ->get();

        return view('chatbot.chats',compact('header','chats'));
    }
    public function chatSingle($id){
        $header="chat";
        $chat = Chat::where(function ($query) use ($id) {
            $query->where('sender', $id)
                ->where('reciever', 'admin');
        })
        ->orWhere(function ($query) use ($id) {
            $query->where('sender', 'admin')
                ->where('reciever', $id);
        })
        ->oldest()
        ->get();

        $chatstatusupdate=Chat::where('sender',$id)->where('reciever','admin')->update([
            'view_status' => 1,
        ]);

        return view('chatbot.chatsingle',compact('header','chat','id','chatstatusupdate'));
    }



    public function getmsg(){
        $output = '';

        $id=auth()->user()->id;
        $chat = Chat::where(function ($query) use ($id) {
            $query->where('sender', $id)
                ->where('reciever', 'admin');
        })
        ->orWhere(function ($query) use ($id) {
            $query->where('sender', 'admin')
                ->where('reciever', $id);
        })
        ->oldest()
        ->get();

        foreach ($chat as $c) {


            if ($c->sender==auth()->user()->id){
            $output .= '

            <h5 class="right-chat">'.$c->message.'</h5> ';
        }
            else{
                $output .= '
            <h5 class="left-chat">'.$c->message.'</h5> ';
            }
        }
        echo $output;
    }


    public function getmsgadmin(Request $req){
        $output = '';
        $id=$req->sender_id;
        $chat = Chat::where(function ($query) use ($id) {
            $query->where('sender', $id)
                ->where('reciever', 'admin');
        })
        ->orWhere(function ($query) use ($id) {
            $query->where('sender', 'admin')
                ->where('reciever', $id);
        })
        ->oldest()
        ->get();


        foreach ($chat as $c) {


            if ($c->sender=='admin'){
            $output .= '

            <h5 class="right-chat">'.$c->message.'</h5> ';
        }
            else{
                $output .= '
            <h5 class="left-chat">'.$c->message.'</h5> ';
            }
        }
        echo $output;
    }


    public function SaveChats(Request $request){
        $savechat = Chat::create([
            'sender' => auth()->user()->id,
            'message' => $request->message,
            'reciever' => 'admin',

        ]);

        if ($savechat) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function SaveChatAdmin(Request $request){
        $savechatadmin = Chat::create([
            'sender' => 'admin',
            'message' => $request->admessage,
            'reciever' => $request->user_id,
        ]);

        if ($savechatadmin) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }
}
