<?php namespace App\Models\Subscriber\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Category\Category;

trait Relationship
{
	/**
	 * Relationship Mapping for Account
	 * @return mixed
	 */
	public function user()
	{
	    return $this->belongsTo(User::class, 'user_id');
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');	
	}
}