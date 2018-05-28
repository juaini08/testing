<?php
 
namespace App\Http\Controllers;
 
use App\Post;
use Illuminate\Http\Request;
 
class PostController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
        $this->middleware(['auth','permission_clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10); 
        return view('posts.index', compact('posts'));
    }
}