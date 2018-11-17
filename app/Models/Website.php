<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    public static $arrActive = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    /**
     * Exposed report attributes.
     *
     * @var array
     */
    public static $reportAttributes = [
        'domain' => 'text',
        'name' => 'text',
        'active' => 'flag',
        'created_at' => 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
