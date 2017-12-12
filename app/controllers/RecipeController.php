<?php

class RecipeController extends BaseController {
	public function listRecipe()
	{
		$recipes = Recipe::orderBY('name', 'desc')->paginate(20);

		return View::make('recipe.listRecipe')->withRecipes($recipes);
	}


	public function addRecipe($id)
	{	
		$user = User::where('id',$id)->first();	 
		return View::make('recipe.addRecipe')->withUser($user);
	}

	public function postAddRecipe()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'title' =>'required',
				'category' => 'required',
				'method' => 'required', 
				'pic' => 'image'				
					), $messages);

		if ($validator->fails())
		{ 
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$recipe 	= new Recipe;
			$recipe->name = Input::get('title');
			$recipe->description = Input::get('method');			
			$recipe->cat_id = Input::get('category');
			$recipe->user_id = Auth::user()->id;

			if(Input::hasFile('pic'))
			{

			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/recipes/' . $filename);
			Image::make(Input::file('pic'))->resize(120,120)->save(public_path() . '/recipes/' . $filename . '_thumb');
			$recipe->image = $filename;
		    }	
			
			$recipe->save() ;

			$ingredients = Input::get('ing');  	  
	    	foreach ($ingredients as $ing)
			{	
				if(!empty($ing)){
				$name = Ingredient::where('name',$ing)->first();
				
					if(!$name){
						$ingredient = new Ingredient;
			 			$ingredient->name = $ing;
			 			$ingredient->save();
					}
				}
	 		}


	 		$ingredients2 = Input::get('ing');	
	 		$amount = Input::get('amount'); 		 
	 		foreach ($ingredients2 as $key=>$ing){
	 			if(!empty($ing)){
				$RI =  new RecipeIngredient;
				$recipe_id =$recipe->id;
				$RI->recipe_id = $recipe_id;

				$ing_id = Ingredient::where('name', $ing)->first()->id;
				$RI->ingredient_id = $ing_id;
				
	 			$RI->amount = $amount[$key];	
	 			$RI->save();					 	
	 			}
	 		}  		

		$name = Auth::user()->username;
			 return Redirect::to('/profile/'.$name)->withSuccess('Ny recipe blev oprettet');
		}

	}

	Public function editRecipe($user_id, $id){
		$recipe = Recipe::where('id',$id)->first();
		return View::make('recipe.editRecipe')->withRecipe($recipe);

	}

	public function postEditRecipe()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'title' =>'required',
				'category' => 'required',
				'method' => 'required', 
				'pic' => 'image'				
					), $messages);

		if ($validator->fails())
		{ 
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$recipe 	= Recipe::where('id', Input::get('id'))->first();
			$recipe->name = Input::get('title');
			$recipe->description = Input::get('method');			
			$recipe->cat_id = Input::get('category');
			$recipe->user_id = Auth::user()->id;

			if(Input::hasFile('pic'))
			{

			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/recipes/' . $filename);
			Image::make(Input::file('pic'))->resize(120,120)->save(public_path() . '/recipes/' . $filename . '_thumb');
			$recipe->image = $filename;
		    }	
			
			$recipe->save() ;

			$ingredients = Input::get('ing');  	  
	    	foreach ($ingredients as $ing)
			{	
				if(!empty($ing)){
				$name = Ingredient::where('name',$ing)->first();
				
					if(empty($name)){
						$ingredient = new Ingredient;
			 			$ingredient->name = $ing;
			 			$ingredient->save();
					}
				}
	 		}


	 		$ingredients2 = Input::get('ing');	
	 		$amount = Input::get('amount'); 		 
	 		foreach ($ingredients2 as $key=>$ing){
	 			if(!empty($ing)){
	 			$ing_id = Ingredient::where('name', $ing)->first()->id;
				$RI =  RecipeIngredient::where('recipe_id', Input::get('id'))->where('ingredient_id', $ing_id)->first();
				
					// $RI->recipe_id = Input::get('id');
				if($RI){
					$RI->amount = $amount[$key];	
					$RI->ingredient_id = $ing_id;
					$RI->recipe_id = $recipe->id;
	 				$RI->save();
				}else{
					$RI = new RecipeIngredient;
					$RI->recipe_id = $recipe->id;
					$RI->ingredient_id = $ing_id;
					$RI->amount = $amount[$key];
					$RI->save();
				}				
									 	
	 			}
	 		} 

	 		

	 		// $ing = Input::get('ing');
	 		// foreach ($ing as $ing) {
	 		// 	$ing_id = Ingredient::where('name', $ing)->first()->id;
	 		// 	 RecipeIngredient::where('recipe_id',Input::get('id'))->list('ingredient_id',$ing_id)->first()->delete();
	 		// 	// foreach ($RI as $RI) {
	 		// 	// 	$RI_ing_id = $RI->ingredient_id; 

	 		// 		// if($RI_ing_id != $ing_id)
	 		// 		// {
	 		// 		// $RI->delete();
	 		// 		// }
	 		// 	//}
	 		
	
	 		// } 
		 $name = Auth::user()->username;
		 	 return Redirect::to('/profile/' .$name)->withSuccess(' recipe blev rettet');
		}

	}


	public function deleteRecipe($user_id, $id)
	{
		 $recipeIngredient = RecipeIngredient::where('recipe_id',$id)->get();
		 foreach($recipeIngredient as $r)
		 {
		 
		 	$r->delete();

		 }
		 $recipe = Recipe::where('id', $id)->first();
		 unlink(public_path(). '/recipes/' . $recipe->image);
			unlink(public_path(). '/recipes/' . $recipe->image. '_thumb');
		Recipe::destroy($id);
		return Redirect::back()->withSuccess('recipe slettet');
	}

	
	public function addToFavourites($id){
		$recipe = Recipe::where('id',$id)->first();
		$fav = new Favourite;
		$fav->recipe_id = $recipe->id;
		$fav->user_id = Auth::user()->id;
		$fav->save();
		return Redirect::back()->withSuccess('recipe added to your favourites');
	}


	
}