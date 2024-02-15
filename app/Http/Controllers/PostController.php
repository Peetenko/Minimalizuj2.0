<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;


class PostController extends Controller
{

	public function index()
	{

		$posts = DB::table('posts')->orderBy('id', 'desc')->get();

		//dd($posts);
	    return view('posts.index', compact('posts'));


	}

	public function create()
	{
		
		
		return view('posts.create');


	}

	public function edit($slug)
	{
		//dd('Im here');
		$post = DB::table('posts')->where('slug', $slug)->first();
		return view('posts.update', ['post' => $post]);


	}

	public function update($slug){
		$post = DB::table('posts')->where('slug', $slug)->update(['name' => request('name'),
			  'title' => request('title'),
			  'slug' => request('slug'),
			  'description' => request('description')
			]


		);

		/*$post->name = request('name');
		$post->title = request('title');
		$post->slug = request('slug');
		$post->description = request('description');
		$post->save();*/

		return redirect('/post');

	}


	public function store()
	{

		$post = new post();
		$form = $_POST;
		foreach ($form as $key => $value) {
			echo $key . " ". $value . "<br>";
		}
	
			
		$post->name = request('name');
		if(isset(auth()->user_id)){
			$post->user_id = auth()->user_id;

		}else{
			$post->user_id = 0;	
		}
		
		$post->title = request('title');
		$post->slug = request('slug');
		$post->description = request('description');
		$post->save();


		return redirect('/post');

	}

	public function show($slug){
		
	
		$post = DB::table('posts')->where('slug', $slug)->first();
		$comments = DB::table('comments')
			->select('id','user_id', 'name', 'comment', 'created_at')
			->where('post_id', $post->id)
			->get();
		$file = asset('images/posts/'.$post->id.'/'.$post->id . '.jpg');
		
		if(file_exists($file)){
			$image = 'show';
		}else{
			$image = '';
		}

		//dd(file_exists($file));
		return view('posts/post', [
			'post' => $post
		], compact('comments','image'));

	}
} 	
