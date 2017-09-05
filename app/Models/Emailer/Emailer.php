<?php namespace App\Models\Emailer;

/**
 * Class Emailer
 *
 * @author Anuj Jaha er.anujjaha@gmail.com
 */

use App\Models\BaseModel;
use App\Models\Emailer\Traits\Attribute\Attribute;
use App\Models\Emailer\Traits\Relationship\Relationship;

class Emailer extends BaseModel
{
    use Attribute, Relationship;
    
    /**
     * Database Table
     *
     */
    protected $table = "data_mailers";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'user_id',
        'subject',
        'body',
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}