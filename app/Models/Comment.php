<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $comment;
    use HasFactory;
    public static function saveComment($request)
    {
        $request->validate([
            'comment' => ['required','alpha','max:255'],
        ]);
        self::$comment = new Comment();
        self::$comment->user_id = $request->user_id;
        self::$comment->blog_id = $request->blog_id;
        self::$comment->comment = $request->comment;
        self::$comment->save();
    }
}
