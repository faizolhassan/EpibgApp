<?php

namespace App\Http\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class FeedbackFilter extends QueryFilters
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
    public function subject($subject)
    {
        return $this->builder->where('subject', $subject);
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
    public function date($date)
    {
        return $this->builder->where('date', $date);
    }
}
