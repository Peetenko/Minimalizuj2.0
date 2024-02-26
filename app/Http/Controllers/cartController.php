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
       
        //dd($cart);
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

    public function toWarehouse(Request $request){
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

                    if($request->crossed == 'crossed' && $product['crossed'] == 1){
                        $store = new Store();
                        $store->amount = $product['amount'];
                        $store->product_id = $product['id'];
                        $store->measure = $product['measure'];
                        $store->expiration = $dateExpired;
                        $store->order = $order;
                        $store->user_id = Auth::user()->id;
                        $store->save();  
                    }elseif($request->crossed == 'normal'){
                        $store = new Store();
                        $store->amount = $product['amount'];
                        $store->product_id = $product['id'];
                        $store->measure = $product['measure'];
                        $store->expiration = $dateExpired;
                        $store->order = $order;
                        $store->user_id = Auth::user()->id;
                        $store->save(); 
                    }
                     
            }


            session()->forget('product');
            return response($store);
            }else{
                $cart =  0;
            }
        }else{
            return response('0');
        }
        
    }

    public function addLinethrough(Request $request){
        $productId = $request->productId;
        $crossed = $request->crossed;
        $cart = Session::get('product');
        $count = 0;
        foreach($cart as $product){
            $count = $count + 1;
            //return response($product);
           if($product['id'] == $productId){
                $position = $count - 1;
                $cart[$position]['crossed'] = 1;
            }
        }
        $updatedCart = $cart;
        Session::forget('product');
        Session::put('product',$updatedCart);
        return response('check');
        //return response($productId);
    }
    
}
