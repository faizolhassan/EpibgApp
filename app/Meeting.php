<?php
namespace Carbon;

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use SoftDeletes;

    public $fillable = [
                        'title', 
                        'location',
                        'time',
                        'date',
                        'detail',
                        'created_at'
                    ];

    protected $dates = ['deleted_at'];
}
