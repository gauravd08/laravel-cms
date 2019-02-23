<?php
namespace App\Models;

class PageSection extends AppModel
{
    public function Page()
	{
		return $this->belongsTo('App\Models\Page');
	}
}
