<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingAttendance extends Model
{
    use SoftDeletes;

    public $fillable = ['name', 
                        'with_partner', 
                        'email',
                        'sonname',
                        'teacher',
                        'time',
                        'date',
                        'with_partner',
                        'detail',
                        'client'
                    ];

    protected $dates = ['deleted_at'];

}
