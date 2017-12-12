<?php

class CatController extends BaseController {
	public function listCat()
	{
		$cat = Category::get();
		return View::make('admin.listCat')->withCat($cat);
	}


	public function addCategory()
	{		 
		return View::make('admin.addCategory');
	}

	public function postAddCategory()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'required'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$cat 	= new Category;
			$cat->name = Input::get('name');
			$cat->save() ;
			
			return Redirect::back()->withSuccess('Ny category blev oprettet');
		}

	}

	public function editCat($id)
	{	
		$cat 	= Category::where('id', $id)->first();	 
		return View::make('admin.editCat')->withCat($cat);
	}

	public function postEditCat()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'required'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$cat 	= Category::where('id', Input::get('id'))->first();
			$cat->name = Input::get('name');
			$cat->save() ;
			
			return Redirect::to('/admin/listCat')->withSuccess('category blev redegeret');
		}

	}


	public function deleteCat($id)
	{
		// $questions = Question::where('cat_id',$id)->get();
		// foreach($questions as $q)
		// {
		// $q->delete();
		// }
		Category::destroy($id);
		return Redirect::back()->withSuccess('category slettet');
	}
}