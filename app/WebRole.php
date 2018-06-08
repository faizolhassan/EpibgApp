<?php

namespace App;

use App\Traits\HasParentModel;
use App\Traits\SpatiePermission;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class WebRole extends SpatieRoleModel
{
    use HasParentModel;
    use SpatiePermission;

    protected $table = 'roles';
    protected $guard_name = 'web';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
