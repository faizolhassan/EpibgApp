<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class District extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    protected $table = 'district';

    public $fillable = [
                        'district_name'
                    ];

    protected $dates = ['deleted_at'];
}
