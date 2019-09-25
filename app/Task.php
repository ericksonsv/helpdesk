<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean',
    ];

    public function assignedTo()
    {
    	return $this->belongsTo(Employee::class, 'assigned');
    }

    public function requestedBy()
    {
        return $this->belongsTo(Employee::class, 'requested');
    }
}
