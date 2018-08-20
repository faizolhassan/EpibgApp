<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class Feedback extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    public $fillable = [
                        'category', 
                        'subject', 
                        'date', 
                        'time', 
                        'detail'
                    ];

    protected $dates = ['deleted_at'];
}
