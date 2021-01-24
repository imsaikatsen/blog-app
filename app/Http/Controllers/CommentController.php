<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     *
     */
    public function store(Request $request, $id){

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $id;
        $comment->created_by = Auth::user()->id;
        $comment->save();
        return redirect()->back();

    }
}
