<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use DB;

class DiscussionController extends Controller
{
    public function index(){
    	$discussions = DB::table('discussions')
    		->select('*')
    		->paginate(50);

    	return view('discussion.index', compact('discussions'));

    }

    public function create(){
    	$discussions = DB::table('discussions')
    		->select('*')
    		->paginate(50);

    	return view('discussion.create');

    }
	public function store(Request $request)
		{
			//dd($request);
			$discussion = new discussion();
			$form = $_POST;
			foreach ($form as $key => $value) {
				echo $key . " ". $value . "<br>";
			}
		
				
			$discussion->name = request('name');
			/*if(isset(auth()->user_id)){
				$discussion->user_id = auth()->user_id;

			}else{
				$discussion->user_id = 0;	
			}*/
			
			$discussion->title = request('title');
			//$discussion->slug = request('slug');
			$discussion->description = request('description');
			$discussion->save();


			return redirect('/discussion');

		}

	public function discussion(Request $request,$id){
		//dd($request);
		$discussion = DB::table('discussions')->where('id', $id)->first();
		$comments = DB::table('comments')->select('user_id', 'name', 'comment', 'created_at')->where('post_id', $discussion->id)->get();
		//dd($comments);
		return view('discussion.discussion', compact('comments','discussion','id'));
	}
		
}
