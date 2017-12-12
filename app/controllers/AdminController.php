<?php

class AdminController extends BaseController {

	

	public function admin()
	{
		return View::make('admin.admin');
	}
	

	

	public function users()
	{	
		$users = User::get();
		return View::make('admin.users')->withUsers($users);
	}

	
	public function deleteUser($id)
	{
		$recipes = Recipe::where('user_id',$id)->get();
		foreach($recipes as $recipe)
		{
			$recipe = Recipe::where('id',$recipe->id)->first();
			unlink(public_path(). '/recipes/' . $recipe->image);
			unlink(public_path(). '/recipes/' . $recipe->image. '_thumb');
			$recipe->delete();
		}	
		$user = User::where('id', $id)->first();
		unlink(public_path(). '/users/' . $user->image);
		unlink(public_path(). '/users/' . $user->image. '_thumb');
		User::destroy($id);
		
		return Redirect::back()->withSuccess('user blev slettet');
	}

	public function pages()
	{
		$pages = Page::get();
		return View::make('admin.pages')->withPages($pages);
	}

	public function addPage()
	{
		return View::make('admin.addPage');
	}
	public function postAddPage()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'unique'=> 'page already exists',
			);

		$validator = Validator::make(Input::All(),
			array(
				'title' =>'required|unique:pages',
				'description' => 'required'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$page 	= new Page;
			$page->title = Input::get('title');
			$page->description = Input::get('description');
			$page->save() ;
			
			return Redirect::to('/admin/pages')->withSuccess('Ny page blev oprettet');
		}

	}

	public function editPage($id)
	{
		$page = Page::where('id',$id)->first();
		return View::make('admin.editPage')->withPage($page);
	}

	public function postEditPage()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'unique'=> 'page already exists',
			);

		$validator = Validator::make(Input::All(),
			array(
				'title' =>'required',
				'description' => 'required'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$page 	= Page::where('id',Input::get('id'))->first();
			$page->title = Input::get('title');
			$page->description = Input::get('description');
			$page->save() ;
			
			return Redirect::to('/admin/pages')->withSuccess('page blev rettet');
		}

	}

	public function deletePage($id)
	{
		
		Page::destroy($id);
		
		return Redirect::back()->withSuccess('page blev slettet');
	}

	public function userProfile($id){
		$user = User::where('id',$id)->first();
		return View::make('admin.userProfile')->withUser($user);
	}

	public function addNews()
	{
		
		return View::make('admin.createNews');
	}


	public function postAddNews()
	{

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');	
			
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/admin/createNyhed')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		$news = new News;
		$news->title = Input::get('title');
		$news->description = Input::get('description');
		$news->save();
		return Redirect::to('/admin/listNews')->withSuccess('news blev oprettet');
	    }
	}

	public function listNews()
	{
		$news = News::get();
		return View::make('admin.listNews')->withNews($news);
	}

	public function editNews($id)
	{
		$news 	= News::where('id', $id)->first();
		return View::make('admin.editNews')->withNews($news);

	}

	public function postEditNews()
	{ 
	   $id = Input::get('id');

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');	
			
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{ 
			return Redirect::to('/admin/editNews/' .$id)
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{

			$news 	= News::where('id', $id)->first();
			$news->title = Input::get('title');
			$news->description = Input::get('description');
			$news->save();
			return Redirect::to('/admin/listNews')->withSuccess('news blev rettet');
	    }
	}

	public function deleteNews($id)
	{
		News::destroy($id);
		return Redirect::back()->withSuccess('News blev slettet');

	}

	

}
