<?php

namespace App\Http\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;
//use App\Traits\Filterable;
//use App\Traits\Resultable;

class DonationFilter extends QueryFilters
{
    //use Filterable;
    //use Resultable;
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
    public function name($name)
    {
        return $this->builder->where('name', $name);
    }

    /**
     * Filter by email
     *
     * @param  string $email
     * @return Builder
     */
    public function category($category)
    {
        return $this->builder->where('category', $category);
    }

    /**
     * Filter by verified
     *
     * @param  string $verified
     * @return Builder
     */
    public function total($total)
    {
        return $this->builder->where('total', $total);
    }
}
