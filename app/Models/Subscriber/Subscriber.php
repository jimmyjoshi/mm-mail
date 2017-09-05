<?php namespace App\Models\Subscriber;

/**
 * Class Subscriber
 *
 * @author Anuj Jaha er.anujjaha@gmail.com
 */

use App\Models\BaseModel;
use App\Models\Subscriber\Traits\Attribute\Attribute;
use App\Models\Subscriber\Traits\Relationship\Relationship;

class Subscriber extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_subscribers";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'company_name',
        'mobile',
        'other_contact',
        'email_id',
        'other_email_id',
        'notes'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}