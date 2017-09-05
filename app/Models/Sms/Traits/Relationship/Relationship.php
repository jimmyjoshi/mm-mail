<?php namespace App\Models\Sms\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Subscriber\Subscriber;
use App\Models\Template\Template;

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
	 * Relationship Mapping for Subscriber
	 * @return mixed
	 */
	public function subscriber()
	{
	    return $this->belongsTo(Subscriber::class, 'subscriber_id');
	}
}