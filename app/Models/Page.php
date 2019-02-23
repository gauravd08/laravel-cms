<?php
namespace App\Models;

class Page extends AppModel
{

    /**
	 * 
	 * @return type
	 * get Page List
	 */
	public static function pageList()
	{
		$pageList = self::pluck('name', 'id')->all();
		return $pageList;
	}
    
    public function PageSection()
	{
		return $this->hasMany('App\Models\PageSection');
	}
	
    public function PageImage()
	{
		return $this->hasMany('App\Models\PageImage');
	}
}
