<?php namespace App\Models\Template;

/**
 * Class Template
 *
 * @author Anuj Jaha er.anujjaha@gmail.com
 */

use App\Models\BaseModel;
use App\Models\Template\Traits\Attribute\Attribute;
use App\Models\Template\Traits\Relationship\Relationship;

class Template extends BaseModel
{
    use Attribute, Relationship;
    
    /**
     * Database Table
     *
     */
    protected $table = "data_templates";

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