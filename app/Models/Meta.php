<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'model',
        'attribute',
        'label',
        'type'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
