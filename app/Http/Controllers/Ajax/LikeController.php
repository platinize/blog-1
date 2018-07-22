<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class LikeController extends Controller
{
    public function createOrDestroy($postId)
    {
        $post = Post::find($postId);

        $user = Auth::user();

        if ( !$post->likes()->wherePivot('user_id', $user->id)->count() ) {
            $post->likes()->attach($user->id);
        } else {
            $post->likes()->detach($user->id);
        }

        return response()->json(['likes' => $post->likes()->count()]);
    }
}
