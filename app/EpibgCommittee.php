<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;
use App\Traits\Resultable;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class EpibgCommittee extends Model implements HasMedia
{
    use HasMediaTrait;
    use SoftDeletes;
    use Filterable;
    use Resultable;

    protected $table = 'epibg_committee';

    public $fillable = [
                        'biodata', 
                        'email', 
                        'name',
                        'pibg_position',
                        'work_occupation'
                    ];

    protected $dates = ['deleted_at'];

    //public function registerImageCollections()
    //{
      //  $this->addMediaCollection('image');
    //}


}
