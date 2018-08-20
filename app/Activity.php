<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Activity extends Model implements HasMedia
{
    use HasMediaTrait;
    use SoftDeletes;
    use Filterable;
    use Resultable;

    protected $table = 'activity';

    public $fillable = [
                        'activity_name', 
                        'activity_school', 
                        'activity_location', 
                        'activity_date',
                        'activity_detail'
                    ];

    protected $dates = ['deleted_at'];
}
