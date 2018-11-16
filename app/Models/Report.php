<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'model'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
