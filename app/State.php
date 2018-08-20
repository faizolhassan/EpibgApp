<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

class State extends Model
{
    use SoftDeletes;
    use Filterable;
    use Resultable;

    protected $table = 'state';

    public $fillable = [
                        'state_name',
                    ];

    protected $dates = ['deleted_at'];

}
