<?php



Route::get('/', 'HomeController@index');
Route::get('/recipe', 'HomeController@recipe');
Route::get('/recipe/{id}', 'HomeController@showRecipe');

Route::get('/home/{page}', 'HomeController@getPage');

Route::get('/login', 'HomeController@login');
Route::get('/register', 'HomeController@register');
Route::group(array('before' => 'csrf'), function(){
		Route::post('/', array('uses' => 'HomeController@postSearch', 'as' =>'postSearch'));
		Route::post('/login', array('uses' => 'HomeController@postLogin', 'as' =>'postLogin'));
		Route::post('/register', array('uses' => 'HomeController@postRegister', 'as' =>'postRegister'));
		// Route::post('/', array('uses' => 'HomeController@postSearch', 'as' =>'postSearch'));				
	});

Route::group(array('before' => 'auth'), function(){
	Route::get('/profile/{username}', 'HomeController@profile');
	Route::get('/profile/editUser/{id}', 'HomeController@editUser');

	Route::get('/profile/{id}/addRecipe', 'RecipeController@addRecipe');
	Route::get('/profile/{user_id}/editRecipe/{id}', 'RecipeController@editRecipe');
	Route::get('/profile/{user_id}/deleteRecipe/{id}', 'RecipeController@deleteRecipe');
	Route::get('/profile/{user_id}/favourites', 'HomeController@favourites');
	Route::get('/profile/{user_id}/lastSearch', 'HomeController@lastSearch');



	Route::get('/recipe/addToFavourites/{id}', 'RecipeController@addToFavourites');
	Route::get('/recipe/voteRecipe/{recipe_id}', 'HomeController@voteRecipe');
	Route::get('/recipe/voteUser/{user_id}', 'HomeController@voteUser');


	Route::get('/logout','HomeController@logout');
	
	
	
	Route::group(array('before' => 'csrf'), function(){
		Route::post('/profile/{id}/addRecipe', array('uses' => 'RecipeController@postAddRecipe', 'as' =>'postAddRecipe'));
		Route::post('/profile/{user_id}/editRecipe/{id}', array('uses' => 'RecipeController@postEditRecipe', 'as' =>'postEditRecipe'));

		Route::post('/profile/editUser/{id}', array('uses' => 'HomeController@postEditUser', 'as' =>'postEditUser'));
		

	});

	Route::group(array('before' => 'admin'), function(){
		Route::get('/admin', 'AdminController@admin');
		Route::get('/admin/pages', 'AdminController@pages');
		Route::get('/admin/addPage', 'AdminController@addPage');
		Route::get('/admin/editPage/{id}', 'AdminController@editPage');
		Route::get('/admin/deletePage/{id}', 'AdminController@deletePage');
		Route::get('/admin/viewPage/{page}', 'HomeController@getPage');

		Route::get('/admin/users', 'AdminController@users');

		Route::get('/admin/listCat', 'CatController@listCat');
		Route::get('/admin/addCategory', 'CatController@addCategory');
		Route::get('/admin/editCat/{id}', 'CatController@editCat');
		Route::get('/admin/deleteCat/{id}', 'CatController@deleteCat');
		
		Route::get('/admin/listNews', 'AdminController@listNews');
		Route::get('/admin/userProfile/{id}','AdminController@userProfile');
		Route::get('/admin/deleteUser/{id}','AdminController@deleteUser');

		Route::get('/admin/addNews', 'AdminController@addNews');
		Route::get('/admin/editNews/{id}', 'AdminController@editNews');
		Route::get('/admin/deleteNews/{id}', 'AdminController@deleteNews');
		
		
		Route::group(array('before' => 'csrf'), function(){	
			Route::post('/admin/addPage', array('uses' => 'AdminController@postAddPage', 'as' =>'postAddPage'));
			Route::post('/admin/editPage/{id}', array('uses' => 'AdminController@postEditPage', 'as' =>'postEditPage'));
			
			Route::post('/admin/listCat', array('uses' => 'CatController@postAddCategory', 'as' =>'postAddCategory'));
			Route::post('/admin/editCat/{id}', array('uses' => 'CatController@postEditCat', 'as' =>'postEditCat'));

			Route::post('/admin/addNews', array('uses' => 'AdminController@postAddNews', 'as' =>'postAddNews'));
			Route::post('/admin/editNews/{id}', array('uses' => 'AdminController@postEditNews', 'as' =>'postEditNews'));
					
		});
	});
});
