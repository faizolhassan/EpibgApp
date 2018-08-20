<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    public $fillable = [
                       'name',
                       'identification_number',
                       'address',
                       'mother_name',
                       'father_name',
                       'caretaker_name',
                       'level_standard_study',
                       'telephone_number_caretaker',
                    ];

    protected $dates = ['deleted_at'];
}
