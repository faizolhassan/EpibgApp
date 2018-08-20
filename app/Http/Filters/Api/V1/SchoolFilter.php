<?php

namespace App\Http\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class SchoolFilter extends QueryFilters
{
    /**
     * Filter by latest.
     *
     * @param  string $order
     * @return Builder
     */
    public function latest($order = 'desc')
    {
        return $this->builder->orderBy('created_at', $order);
    }


    /**
     * Filter by name
     *
     * @param  string $name
     * @return Builder
     */
    public function schoolname($schoolname)
    {
        return $this->builder->where('school_name', $schoolname);
    }

    public function district($district)
    {
        return $this->builder->where('district', $district);
    }
}
