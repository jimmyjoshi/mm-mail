<?php namespace App\Models\Sms;

/**
 * Class SMS
 *
 * @author Anuj Jaha er.anujjaha@gmail.com
 */

use App\Models\BaseModel;
use App\Models\Sms\Traits\Attribute\Attribute;
use App\Models\Sms\Traits\Relationship\Relationship;

class Sms extends BaseModel
{
    use Attribute, Relationship;

    /**
     * Database Table
     *
     */
    protected $table = "data_sms";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'user_id',
        'subscriber_id',
        'message',
        'status',
        'send_status',
        'schedule_time',
        'send_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];

    public $timestamps = true;
}