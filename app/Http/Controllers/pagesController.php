<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class pagesController extends Controller
{


    public function home(){

	    return view('welcome');

    }


    public function about(){
    	$comments = [
			'comment1',
			'comment2',
			'comment3',
			'comment4'
		];

	    return view('about',[
	    	'comments' => $comments
	    ]);

    }

	public function contact(){

	    return view('contact');


	}

	public function post(){

		$posts = \App\post::all();


	    return view('post', compact('posts'));


	}



	public function discussion(){

	    return view('discussion');


	}

	public function question(){

	    return view('question');


	}

	public function survey(Request $request){

		//dd($request->ip());
		
	    return view('survey');


	}


}
