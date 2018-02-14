<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Auth;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function newpost()
    {
        return view('new');
    }
    
    public function listposts()
    {
    	$posts = Post::orderBy('updated_at','desc')->get();
        return view('list',['posts' => $posts]);
    }
    
    public function createpost(PostRequest $request)
    {
		  $post = new Post();
		  $post->fill($request->all());
   	  	  $post->user_id = Auth::user()->id;
   	  	  $post->save();
   	  	  return redirect()->route('listposts');
    }
    
    public function editpost(Request $request, $id)
    {
    		$post = Post::find($id);
			return view('edit', ["post" => $post]);	
	}
	
	public function commitpost(PostRequest $request, $id)
    {
    	  $post = Post::find($id);
		  if (Gate::denies('update-post', $post))
		  {
				return back()-> withErrors(['Нет прав на редактирование статьи!!!']);
	      }    
          $post->fill($request->all());
   	  	  $post->user_id = Auth::user()->id;
   	  	  $post->save();
   	  	  return redirect()->route('listposts');

	}
}
