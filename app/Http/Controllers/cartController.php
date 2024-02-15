<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Store;
use Illuminate\Support\Facades\Auth;


class cartController extends Controller
{
    public function cart(){
        if(Session::get('product')){
            $cart = Session::get('product'); 
        }else{
            $cart =  0;
        }
        
        return view('cart',compact('cart'));
    }

    public function delFromCart($product)
    {
        $cart = Session::get('product');
        
        foreach($cart as $key => $item){
            if($item['id'] == $product){
                session()->forget('product.'.$key);
            }
            
        }
        
    }

    public function toWarehouse(){
        //dd('warehouse');
        if(Auth::user()->id){
            if(Session::get('product')){
                $cart = Session::get('product'); 
                //save to store
                $order = 0;
                
                foreach($cart as $product){
                    $order = $order + 1;
                    if(is_null($product['dateExpired'])){
                        $dateExpired = null;
                    }else{
                        $dateExpired = $product['dateExpired'];
                    }

                    $store = new Store();
                    $store->amount = $product['amount'];
                    $store->product_id = $product['id'];
                    $store->measure = $product['measure'];
                    $store->expiration = $dateExpired;
                    $store->order = $order;
                    $store->user_id = Auth::user()->id;
                    $store->save();   
            }
            session()->forget('product');
            return response($cart);
            }else{
                $cart =  0;
            }
        }else{
            return response('0');
        }
        
    }
    
}
