<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMeta extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['meta_id', 'report_id'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
