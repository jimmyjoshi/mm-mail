<?php namespace App\Models\MailerLog;

/**
 * Class MailerLog
 *
 * @author Anuj Jaha er.anujjaha@gmail.com
 */

use App\Models\BaseModel;

class MailerLog extends BaseModel
{
    /**
     * Database Table
     *
     */
    protected $table = "data_mailers_log";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'subscriber_id',
        'subject',
        'body',
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}