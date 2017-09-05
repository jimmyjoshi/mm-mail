<?php namespace App\Models\Category\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Subscriber\Subscriber;

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

	/**
	 * Relationship Mapping for Account
	 * @return mixed
	 */
	public function subscribers()
	{
	    return $this->hasMany(Subscriber::class);
	}
}