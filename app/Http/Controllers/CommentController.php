<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use DB;
use Auth;

class CommentController extends Controller
{
	public function store( $slug, Request $request)
	{
		$section = request()->segment(1);
		//dd($section);
		switch ($section) {
			case 'post':
				# Post comments
				$post = DB::table('posts')->where('slug', $slug)->first();
				$postID = DB::table('posts')->select('id')->where('slug', $slug)->first();
				$userId = Auth::user()->id;
				//if user is logged in;
				if($userId){
					$userId = $userId;
				}else{
					$userId = '';
				}
				$newComment = new comment();
				$newComment->name = request('userComment');
				$newComment->comment = request('textComment');
				$newComment->post_id = $postID->id;
				$newComment->user_id = $userId;
				$newComment->section = 1;
				$newComment->save();

				$comments = DB::table('comments')
					->select('user_id', 'name', 'comment', 'created_at')
					->where('post_id', $post->id)
					->get();

			
				return view('posts.post',['post' => $post], compact('comments'));
				break;

			case 'discussion':
				# Discussion comments
				//dd('hello discussion comment is here');
				$discussionId = request()->segment(2);
				$userId = Auth::user()->id;
				//dd($userId,$discussionId);
				if($userId){
					$userId = $userId;
				}else{
					$userId = '';
				}
				$newComment = new comment();
				$newComment->name = request('userComment');
				$newComment->comment = request('textComment');
				$newComment->post_id = $discussionId;
				$newComment->user_id = $userId;
				$newComment->section = 2;
				$newComment->save();
				
				return redirect('/discussion/' . $discussionId);

				break;
			case '3':
				# Donate comments
				break;
			case '4':
				#Sell comments
				break;
			
			default:
				# code...
				break;
		}

		
		
	}
  
}
