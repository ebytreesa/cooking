<?php

class HomeController extends BaseController {

	

	public function index()
	{
		return View::make('index');
	}
	public function register()
	{
		return View::make('register');
	}
	public function login()
	{
		return View::make('login');
	}

	public function postRegister()
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
			'email'	=> 'skriv en gyldig email adresse',
			'unique'=> 'brugernavnet er optaget',
			'same'	=> 'koderne er ikke ens',
			'min'	=> ':attribute feltet skal være min 6 tegn',
			'image' => 'du skal vælg en billedefil'
			);
		$validator	= Validator::make(Input::All(), array(
			'username'	=> 'required|unique:users',
			'email'	=> 'required|email',
			'pass1'	=>	'required|min:6',
			'pass2'	=>	'required|same:pass1',
			'pic' => 'image'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/register')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{ 
			$user = new User;
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			$user->password	= Hash::make(Input::get('pass1'));
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/users/' . $filename);
			Image::make(Input::file('pic'))->resize(120,120)->save(public_path() . '/users/' . $filename . '_thumb');
			$user->image = $filename;
		    }
			
			$user->save();
				
		}
		if ($user)
		{
			return Redirect::to('/login')->withSuccess('Brugeren blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}

	}

	

	public function postLogin()
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes'
			);
		$rules = array(
				'username' => 'required',
				'password' => 'required'
				);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails())
		{
			return Redirect::to('/login')->withError('login failed');
		}else
		{
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
				);
			if(Auth::attempt($userdata))
			{
				$name = Auth::user()->username;
				return Redirect::to('/profile/'.$name)->withSuccess('You are now logged in');
			}else
			{
				return Redirect::to('/login')->withError('username or password invalid');
			}
				
		}
	}

	public function editUser($id)
	{
		$user = User::where('id', $id)->first();
		return View::make('editUser')->withUser($user);
	}

	public function postEditUser()
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
			'email'	=> 'skriv en gyldig email adresse',
			'unique'=> 'brugernavnet er optaget',			
			'image' => 'du skal vælg en billedefil'
			);
		$validator	= Validator::make(Input::All(), array(
			'username'	=> 'required',
			'email'	=> 'required|email',
			// 'pass1'	=>	'required|min:6',
			// 'pass2'	=>	'required|same:pass1',
			'pic' => 'image'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/register')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{ 
			$user = User::where('id', Auth::user()->id)->first();
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			
			if(Input::hasFile('pic'))
			{

			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/users/' . $filename);
			Image::make(Input::file('pic'))->resize(120,120)->save(public_path() . '/users/' . $filename . '_thumb');
			$user->image = $filename;
		    }
			
			$user->save();
				
		}
		if ($user)
		{
			$name = Auth::user()->username;
			return Redirect::to('/profile/'.$name)->withSuccess('Brugeren blev rettet');
		}else
		{
			return "der opstod en fejl";
		}

	}

	public function profile($username)
		{
			$user = User::where('username', $username)->first();
			return View::make('profile')->withUser($user);
		}

		
	public function logout()
		{
			Auth::logout();
			return Redirect::to('/')->withSuccess('you are logged out');
		}


	public function postSearch(){return "ffg";
		$search = Input::get('search');
		$recipes = DB::table('recipes')
				->join('users', 'users.id', '=','recipes.user_id' )
				->select('users.username as username', 'recipes.*')
				->where('username', 'like', '%'.$search.'%')
				->orWhere('name', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%')
				->paginate(10);
			if (Auth::check()) {
				
			
					$user_search = new Search;
					$user_search->search = $search;
					$user_search->user_id = Auth::user()->id;
					$user_search->save();	
			}

		// $recipes = Recipe::where('name','like','%'.$search.'%')
  //   			->orWhere('description','like','%'.$search.'%') 		
  //   			->paginate(10);

		return View::make('searchResults')->withRecipes($recipes)->withSearch($search);				
			
	}
	public function getPage($page){
		$page = Page::where('title', $page)->first();
		return View::make('showPage')->withPage($page);
		
	}

	public function recipe(){
		$recipes = Recipe::orderBy('name', 'asc')->paginate('8');
		return View::make('recipe')->withRecipes($recipes);
	}

	public function showRecipe($id){ 
		$recipe = Recipe::where('id', $id)->first();
		return View::make('showRecipe')->withRecipe($recipe);
	}

	public function favourites($user_id){ 
		$fav = Favourite::where('user_id', $user_id)->get();		
		return View::make('favourites')->withFav($fav);
	}

	public function voteUser($user_id){
		$user = User::where('id', $user_id)->first();
		$user->votes = $user->votes + 1;
		$user->save();
		return Redirect::back()->withSuccess('voted for kok');
	}

	public function voteRecipe($recipe_id){
		$recipe = Recipe::where('id', $recipe_id)->first();
		$recipe->votes = $recipe->votes + 1;
		$recipe->save();
		return Redirect::back()->withSuccess('voted for recipe');

	}

	public function lastSearch($user_id){
		$search = Search::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();
		return View::make('lastSearch')->withSearch($search);

	}

}
