<?php

class Article extends Eloquent
{
	protected $table="article";

	public function categories()
	{
		return $this->belongsToMany('Category' , 'category-article', 'articleId' , 'categoryId');
	}
}