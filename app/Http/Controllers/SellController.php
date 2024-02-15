<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use DB;

class SellController extends Controller
{
    public function index(){

    	$Sales = DB::table('sales')->orderBy('id','desc')->simplePaginate(10);
    	
    	return view('sell.index', compact('Sales'));
    }

    public function create(){

    	return view('sell.create');
    }

    public function sellFilter(Request $request){
        $text = $request->filter;
        $sales = DB::table('sales')
            ->where('title','like', '%' . $text . '%')
            ->orderBy('id','desc')
            ->get();
        return view('sell.sellFilter',compact('sales'));
    }

    public function store(Request $request){

      	//save file
    	$lastDonate = DB::table('sales')->orderBy('id','desc')->first();

        if($lastDonate == null){
            $dirName = 1;
        } else {
            $dirName = $lastDonate->id + 1;
        }
        $images = $request->file('image');
        foreach($images as $image){
            $filename = $image->getClientOriginalName();
            $image->move(public_path() .'/images/sell/' . $dirName . '/',$filename);
  	    }
    	$imagePath = 'sell/' . $dirName . '/' . $filename;

        //save donation
    	$sales = new Sell();
		$sales->name = request('name');
		$sales->user_id = 0 ;
		$sales->title = request('title');
		$sales->email = request('email');
		$sales->phone = request('phone');
		$sales->body = request('body');
		$sales->thumbnail = '';
		$sales->image = $imagePath;
        $sales->price = request('price');
		$sales->save();

    	return redirect('/sell');
    }

    public function gallery($id){

        //dd("you are in donate controller");
 
        $path = 'images/sell/'. $id ;
        $files = scandir(public_path($path));
        $count = count($files) - 2;
        $fullpath = array();
        foreach($files as $file) {
            if($file == '.' || $file == '..'  ){
            
             //dd($fullpath); 
            }else{
               $item = $path . '/'. $file; 
             array_push($fullpath, $item);  
            }
          
          
        }
        //dd($fullpath);

        return view('layouts.gallery', compact('files','fullpath','count'));
    }



}
