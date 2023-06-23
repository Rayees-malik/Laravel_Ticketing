<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request){

        $request->validate([
            'comment' => 'required|max:255'
        ]);

        $comment  = Comment::create([
            'comment' => $request->comment,
            'ticket_id' => $request->ticket_id,
            'user_id' => Auth::user()->id
        ]);

        $comment->save();

        return redirect("/ticket/".$request->ticket_id);
    }
}
