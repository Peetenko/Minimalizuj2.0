<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donate;
use DB;

class DonateController extends Controller
{
    public function index(){
    	//view donations
    	$donations = DB::table('donates')
        ->orderBy('id','desc')
        ->simplePaginate(10);
        
    	return view('donate.index', compact('donations'));
    }

    public function donateFilter(Request $request){
        $text = $request->filter;
        $donations = DB::table('donates')
            ->where('title','like', '%' . $text . '%')
            ->orderBy('id','desc')
            ->simplePaginate(10);
        return view('donate.donateFilter',compact('donations'));
    }

    public function create(){
    	return view('donate.create');
    }

    public function store(Request $request){

      	//save file	
      	$lastDonate = DB::table('donates')->orderBy('id','desc')->first();
      	$dirName = $lastDonate->id + 1;
        $images = $request->file('image');
        foreach($images as $image){
            $filename = $image->getClientOriginalName();
            $image->move(public_path() .'/images/donate/' . $dirName . '/',$filename);
    	}
    	$imagePath = 'donate/' . $dirName . '/'.$filename;

        //save donation
       	$donate = new donate();
		$donate->name = request('name');
		$donate->user_id = 0 ;
		$donate->title = request('title');
		$donate->email = request('email');
		$donate->phone = request('phone');
		$donate->body = request('body');
		$donate->thumbnail = '';
		$donate->image = $imagePath;
		$donate->save();
        
    	return redirect('/donate');
    }

    public function gallery($id){

        $path = 'images/donate/'. $id;
        $files = scandir(public_path($path));
        $count = count($files) - 2;
        $fullpath = array();
        foreach($files as $file) {
            if($file == '.' || $file == '..'  ){
                //do nothing
            }else{
               $item = $path . '/'. $file; 
             array_push($fullpath, $item);  
            } 
        }
        return view('layouts.gallery', compact('files','fullpath','count'));
    }


}
