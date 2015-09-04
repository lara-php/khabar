<?php

class Category extends Eloquent
{
	protected $table="category";

	public function articles()
	{
		return $this->belongsToMany('Article' , 'category-article', 'categoryId' , 'articleId');
	}
}