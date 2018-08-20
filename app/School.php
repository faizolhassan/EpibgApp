<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class School extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    protected $table = 'school';

    public $fillable = [
                        'school_name',
                        'school_code',
                        'district'
                    ];

    protected $dates = ['deleted_at'];
}
