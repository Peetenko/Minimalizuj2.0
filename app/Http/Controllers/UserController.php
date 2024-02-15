<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    public function user(){
        $userId = Auth::user()->id;
        $store = DB::table('store')
            ->select('*')
            ->join('products','products.id','=','store.product_id')
            ->where('user_id',$userId)
            ->get()
            ->toArray();

        //dd(Auth::user());

        $recommendedRecipes = DB::Select("SELECT count(recipeId) as ingredients,recipeId FROM minimalizuj.recipe_ingredients as a
            inner join minimalizuj.store as b on a.ingredientId = b.product_id
            where user_id = $userId
            group by recipeId
            order by ingredients desc");
        $recommIds = array();
        //dd($recommendedRecipes);
        foreach ($recommendedRecipes as $recipeId) {
            array_push($recommIds, $recipeId->recipeId);
        }

        $recipes = DB::table('recipes')
            ->select('*')
            ->where('contentType', '1')
            ->whereIn('id',$recommIds)
            ->get();

        //dd($recipes);

        return view('user',compact('store','recipes','recommendedRecipes'));
    }
}
