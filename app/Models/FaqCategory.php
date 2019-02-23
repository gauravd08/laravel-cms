<?php
namespace App\Models;

class FaqCategory extends AppModel
{
    public static function faqCategoryList()
	{
		$list = self::pluck('category_name', 'id')->all();
		return $list;
	}
    
    public function faq()
	{
		return $this->hasMany('App\Models\Faq');
	}
}
