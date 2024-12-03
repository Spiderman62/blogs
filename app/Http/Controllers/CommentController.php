<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function store(Request $request){
        $fields = $request->validate([
            'comment' => 'required|min:2|max:80',
            'blog_id' => 'required|integer|exists:blogs,id'
        ]);
        $user_id = Auth::user()->id;
        Comment::create([
            'comment' => $fields['comment'],
            'blog_id' => $fields['blog_id'],
            'user_id' => $user_id
        ]);
        return redirect()->back()->with('comment_status', 'Comment posted successfully');
    }
    public function update(Request $request){
        $fields = $request->validate([
            'id'=>'required|integer',
            'comment' => 'required|min:2|max:80',
        ]);
        Comment::find($fields['id'])->update([
            'comment' => $fields['comment'],
        ]);

    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back()->with('comment_status', 'Comment deleted successfully');
    }

}
