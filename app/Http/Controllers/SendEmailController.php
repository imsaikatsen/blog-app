<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class SendEmailController extends Controller
{

    public function send($id){
        $post = Post::find($id);
        Mail::to('saikat@gmail.com')->send(new SendMail($post));
        return redirect()->back();
    }
}
