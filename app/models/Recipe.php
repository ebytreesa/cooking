<?php
class Recipe extends Eloquent{
	protected $table = 'recipes';

	public function users()
	{
		return $this->belongsTo('user');
	}

}