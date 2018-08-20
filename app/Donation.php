<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class Donation extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    public $fillable = [
                        'name',
                        'email',
                        'category',
                        'total',
                        'detail',
                        ];
protected $dates = ['deleted_at'];

}
