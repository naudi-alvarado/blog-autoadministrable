<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_post_publicados= Post::where('status',Post::PUBLICADO)->count();
        $total_post_borrador= Post::where('status',Post::BORRADOR)->count();
        $total_comentarios= Review::all()->count();
        $total_usuarios_post= User::select('users.id','users.name')->join('posts','posts.user_id','=','users.id')
        ->distinct('id')
        ->get();

        $user_posts = User::select(['id','name'])
        ->withCount('posts')
        ->orderBy('posts_count','DESC')
        ->take(10)
        ->get();
        
      
       
        return view('admin.index',compact('total_post_publicados','total_post_borrador','total_comentarios','user_posts'));
    }
}
