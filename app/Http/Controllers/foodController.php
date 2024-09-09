<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use DB;
use Session;
use App\Http\Controllers\cartController;
use Auth;


class foodController extends Controller
{
	public function index(){
		$sections = DB::table('sections')
			->select('*')
			->get();

		return view('food.index',compact('sections'));
	}

	public function section($section){
		$products = DB::table('products')
			->select('*')
			->where('section',$section)
			->orderBy('order','asc')
			->get();
		$measures = DB::table('measures')
			->select('*')
			->get();
		$sectionName = DB::table('sections')
			->select('name')
			->where('id',$section)
			->first();

		return view('food.product',compact('products','measures','sectionName'));
	}

	public function productCreate(Request $request){

		//dd($request);

		$parameters = DB::table('parameters')
			->select('*')
			->get();
		$measures = DB::table('measures')
			->select('*')
			->get();
		$sections = DB::table('sections')
			->select('*')
			->get();

		return view('food.productCreate',compact('parameters','measures','sections'));
	}

	public function product(Request $Request, $product){
		$product = DB::table('products')
			->select('*')
			->where('id',$product)
			->get();

		$measure = $Request->measure;
		$icon = $product[0]->icon;
		$product = $product;
		$amount = $Request->amount;
		$dateExpired = $Request->dateExpired;

		if(Session::get('product')){
			Session::push('product',['id' => $product[0]->id,
			'name' => $product[0]->name,
			'amount' => $amount,
			'measure' => $measure,
			'dateExpired' => $dateExpired,
			'icon' => $icon,
			'crossed' => 0
			]);
		}else{
			Session::put('product',[['id' => $product[0]->id,
			'name' => $product[0]->name,
			'amount' => $amount,
			'measure' => $measure,
			'dateExpired' => $dateExpired,
			'icon' => $icon,
			'crossed' => 0
			]]);
		}

		//dd($cart);
		return response()->json(['success'=> 'Produkt '. $product[0]->name . ' pridany',
			'measure' => $measure,
			'amount' => $amount,
			'product' => $product,
			'dateExpired' => $dateExpired,
			'cartCount' => count(Session::get('product'))
		]);
	}

	public function recipes(){
		$message = 'these are recipes';
		$recipes = DB::table('recipes')
			->select('*')
			->where('contentType', '1')
			->get();

		return view('recipes.index',compact('message','recipes'));
	}

	public function showRecipe($id,Request $request){
		$shareLink = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$recipe = DB::table('recipes')
			->select('*')
			->where('recipeId', $id)
			->get();
		$ingredients = DB::table('recipe_ingredients')
			->select('recipe_ingredients.ingredientId','recipe_ingredients.amount','recipe_ingredients.measure',
					'products.name as productName','products.icon')
			->join('products','products.id','=','recipe_ingredients.ingredientId')
			//->leftjoin('store','store.product_id','=','products.id')
			->where('recipeId', $id)
			->get();
			//dd($recipe);

		$nextRecipe = $recipe[0]->id + 1;

		return view('recipes.recipe',compact('recipe','ingredients','nextRecipe','shareLink'));
	}

	public function recipeCreate(){

		$recipeFields = DB::table('recipefields')
			->select('*')
			->get();
			if(Session::get('product')){
				$cart = Session::get('product');
			}else{
				$cart =  0;
			}
		return view('recipes.create',compact('recipeFields','cart'));
	}

	public function editRecipe($recipeId){

		$recipe = DB::table('recipes')
			->select('*')
			->where('recipeId', $recipeId)
			->get();

		$ingredients = DB::table('recipe_ingredients')
			->select('*')
			->join('products','products.id','=','recipe_ingredients.ingredientId')
			->where('recipeId',$recipeId)
			->get();

		//dd($recipeId,$recipe,$ingredients);
		return view('recipes.edit',compact('recipe','ingredients'));

	}

	public function delFromRecipe(Request $request){
		$ingredient = $request->ingredient;
		$recipeId = $request->recipeId;
		$delFromRecipe = DB::table('recipe_ingredients')
			->where('recipeId',$recipeId)
			->where('ingredientId',$ingredient)
			->delete();
		return($delFromRecipe);
	}

	public function updateRecipe(Request $request,$recipeId){
		//dd($request,$recipeId);
		$ingredients = DB::table('recipe_ingredients')
			->where('recipeId',$recipeId)
			->get();

		$cart = Session::get('product');
		//dd($cart);
		$post = DB::table('recipes')
			->where('id', $recipeId)
			->where('contentType',1)
			->update([
			  'title' => request('title'),
			  'body' => request('text1')
			  //'image' => request('description')
			]);
		if($cart){
			foreach ($cart as $i){
			$insertIngredients = DB::table('recipe_ingredients')->insertGetId([
				'recipeId' => $recipeId,
				'ingredientId' => $i['id'],
				'amount' => $i['amount'],
				'measure' => $i['measure']
				]);
			}
		}

		if(isset($insertIngredients)){
			$request->session()->forget('product');
		}
		if($request->file('image')){
			$images = $request->file('image');
			$filenames = '';
			$order = 10;
			foreach($images as $image){
	            $filename = $image->getClientOriginalName();
	            $filename = str_replace(' ', '_', $filename);
	            $imagePath = 'images/recipes/' . $recipeId . '/'.$filename;
	            $filenames = $filenames . $imagePath . ',';
	            $image->move(public_path() .'/images/recipes/' . $recipeId . '/',$filename);
	  	    }
			//dd($imagePath);
	  	    $saveImagePath = DB::table('recipes')
			->where('recipeId', $recipeId)
			->where('contentType',1)
			->update([
			  'thumbnail' => '/'. $imagePath,
			  'image' => '/'. $imagePath
			  //'image' => request('description')
			]);
		}
		return redirect('/recipes');
	}

	public function addIngredient(Request $request){

		$ingredient = $request->ingredient;
		$measures = DB::table('measures')
			->select('*')
			->get();
		$products = DB::table('products')
			->select('*')
			->where('name','like', '%' . $ingredient . '%')
			->get();
		$row = '';
		$measureOptions = '';

		foreach($products as $product){
			foreach($measures as $measure){
				if($product->measure == $measure->name){
					$measureOptions = $measureOptions . '<option value="'. $measure->name . '" selected="selected">' . $measure->name . '</option>';
				}else{
					$measureOptions = $measureOptions . '<option value="'. $measure->name . '">' . $measure->name . '</option>';
				}

				}
				$style = 'style="background-image:url(' . asset($product->icon) . ')"';

               $row = $row . '<div class="divRow100 shadow"><div class="foodProduct"'. $style .'></div><div class="foodProductText"><span class="spanProduct">' .
               $product->name . '</span><div class="divProductAttributeWrap"><div class="divMeasureWrap"><input class="productAmount" type="number" id="amount'. $product->id. '" maxlength="7" value="' .
               $product->weight . '"> ' . '<select class="measure" name="measure" id="measure'.$product->id . '">' . $measureOptions . '</select></div>' .
               '<div class="divExpired"><input id="dateExpired'.$product->id . '" class="dateExpired" type="date"></div></div>' .
               	  '</div><button class="btnAddProduct" onclick="fnAddProduct('.$product->id .')" type="button"> + </button></div>';
            $measureOptions = '';
            }
		return response($row);

		/*return response()->json(['success'=> 'Produkt '. $product[0]->name . ' pridany',
			'measure' => $product[0]->measure,
			'amount' => $product[0]->amount,
			'product' => $product[0]->id
		]);*/


	}

	public function recipeInsert(Request $request){
		$ingredients = Session::get('product');
		$text = $request->text1;
		$title = $request->title;
		$fieldArray = array();
		$lastRecipe = DB::table('recipes')->orderBy('recipeId','desc')->first();
      	$dirName = $lastRecipe->recipeId + 1;
		$images = $request->file('image');
		$filenames = '';
		$order = 10;
		$textCount = 1;
		if($request->text2){
			$otherTexts = 'other texts exist';
			$textCount = $textCount +1;
			//dd($otherText);
			while($textCount < 20){
				$textCount++;
				$text = 'text'.$textCount;
				$otherText = $request->$text;
				if($request->$text){

				}else{
					dd($text);
					break;

				}


			}
		}else{
			$otherTexts = 'no other texts';
		}
		//dd($request->request,$otherTexts);
		foreach($images as $image){
            $filename = $image->getClientOriginalName();
            $imagePath = 'images/recipes/' . $dirName . '/'.$filename;
            $filenames = $filenames . $imagePath . ',';
            $image->move(public_path() .'/images/recipes/' . $dirName . '/',$filename);
  	    }


		if(Session::get('userId')){
			$userId = Session::get('userId');
		}else{
			$userId = 1;
			$name = "PT";
		}
		//save recipe row
       	$recipe = new Recipe();
		$recipe->recipeId = $dirName;
		$recipe->user_id = $userId ;
		$recipe->title = $title;
		$recipe->name = $name;
		$recipe->order = $order;
		$recipe->body = $text;
		$recipe->thumbnail = $imagePath;
		$recipe->image = $imagePath;
		$recipe->contentType = 1;
		$recipe->save();

		//save ingredients
		foreach($ingredients as $i){
			$insertIngredients = DB::table('recipe_ingredients')->insertGetId([
				'recipeId' => $dirName,
				'ingredientId' => $i['id'],
				'amount' => $i['amount'],
				'measure' => $i['measure']
				]);
		}
		/*foreach ($request->request as $field => $value){
			if($field != '_token' && $field != 'searchIngredient' && $field != 'measure'){
				array_push($fieldArray,[$field => $value]);
				//save recipe row
		       	$recipe = new Recipe();
				$recipe->recipeId = $dirName;
				$recipe->user_id = $userId ;
				$recipe->title = $title;
				$recipe->name = $name;
				$recipe->order = $order;
				$recipe->body = $text;
				$recipe->thumbnail = '';
				$recipe->image = $imagePath;
				$recipe->contentType = 1;
				$recipe->save();
			}
		}*/
		return redirect('/recipes/'.$dirName);

	}

	public function store(){
		if(!isset(Auth::user()->id)){
			return redirect('auth');
		}
		$store = DB::table('store')
			->select('store.id','store.product_id','store.measure','store.amount','store.expiration','store.order','products.name','products.icon')
			->join('products','products.id','=','store.product_id')
			->where('user_id',Auth::user()->id)
			->orderBy('products.section','asc')
			->get()
			->toArray();
		$today =  date_format(now(),'y-m-d');

		return view('store.store',compact('store','today'));
	}

	public function delStoreProduct(Request $request){
		$id = $request->storeId;
		$deleteFromStore = DB::table('store')
			->where('id',$id)
			->delete();
			return response('product deleted ' . $id);
	}

	public function storeDatailsUpdate(Request $request){
		$storeId = $request->storeId;
		$expDate = $request->expDate;
		$updateExpiration = DB::table('store')
			->where('id',$storeId)
			->update(['expiration' => $expDate]);
		return response($expDate);
	}

	public function shuffle(){
		$cards = array(['id' => 1,'card' => '2','color' => 'heart'],
			['id' => 2,'card' => '3','color' => 'heart'],
			['id' => 3,'card' => '4','color' => 'heart'],
			['id' => 4,'card' => '5','color' => 'heart'],
			['id' => 5,'card' => '6','color' => 'heart'],
			['id' => 6,'card' => '7','color' => 'heart'],
			['id' => 7,'card' => '8','color' => 'heart'],
			['id' => 8,'card' => '9','color' => 'heart'],
			['id' => 9,'card' => '10','color' => 'heart'],
			['id' => 10,'card' => 'J','color' => 'heart'],
			['id' => 11,'card' => 'Q','color' => 'heart'],
			['id' => 12,'card' => 'K','color' => 'heart'],
			['id' => 13,'card' => 'A','color' => 'heart'],
			['id' => 14,'card' => '2','color' => 'spade'],
			['id' => 15,'card' => '3','color' => 'spade'],
			['id' => 16,'card' => '4','color' => 'spade'],
			['id' => 17,'card' => '5','color' => 'spade'],
			['id' => 18,'card' => '6','color' => 'spade'],
			['id' => 19,'card' => '7','color' => 'spade'],
			['id' => 20,'card' => '8','color' => 'spade'],
			['id' => 21,'card' => '9','color' => 'spade'],
			['id' => 22,'card' => '10','color' => 'spade'],
			['id' => 23,'card' => 'J','color' => 'spade'],
			['id' => 24,'card' => 'Q','color' => 'spade'],
			['id' => 25,'card' => 'K','color' => 'spade'],
			['id' => 26,'card' => 'A','color' => 'spade'],
			['id' => 27,'card' => '2','color' => 'diamond'],
			['id' => 28,'card' => '3','color' => 'diamond'],
			['id' => 29,'card' => '4','color' => 'diamond'],
			['id' => 30,'card' => '5','color' => 'diamond'],
			['id' => 31,'card' => '6','color' => 'diamond'],
			['id' => 32,'card' => '7','color' => 'diamond'],
			['id' => 33,'card' => '8','color' => 'diamond'],
			['id' => 34,'card' => '9','color' => 'diamond'],
			['id' => 35,'card' => '10','color' => 'diamond'],
			['id' => 36,'card' => 'J','color' => 'diamond'],
			['id' => 37,'card' => 'Q','color' => 'diamond'],
			['id' => 38,'card' => 'K','color' => 'diamond'],
			['id' => 39,'card' => 'A','color' => 'diamond'],
			['id' => 40,'card' => '2','color' => 'club'],
			['id' => 41,'card' => '3','color' => 'club'],
			['id' => 42,'card' => '4','color' => 'club'],
			['id' => 43,'card' => '5','color' => 'club'],
			['id' => 44,'card' => '6','color' => 'club'],
			['id' => 45,'card' => '7','color' => 'club'],
			['id' => 46,'card' => '8','color' => 'club'],
			['id' => 47,'card' => '9','color' => 'club'],
			['id' => 48,'card' => '10','color' => 'club'],
			['id' => 49,'card' => 'J','color' => 'club'],
			['id' => 50,'card' => 'Q','color' => 'club'],
			['id' => 51,'card' => 'K','color' => 'club'],
			['id' => 52,'card' => 'A','color' => 'club']
			);

		dd($cards);


	}



}
