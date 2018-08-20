<?php

namespace App\Http\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class StudentFilter extends QueryFilters
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
    public function levelStandardStudy($levelstandardstudy)
    {
        return $this->builder->where('level_standard_study', $levelstandardstudy);
    }

    /**
     * Filter by verified
     *
     * @param  string $verified
     * @return Builder
     */
    public function identificationnumber($identificationnumber)
    {
        return $this->builder->where('identification_number', $identificationnumber);
    }

    public function mothername($mothername)
    {
        return $this->builder->where('mother_name', $mothername);
    }

    public function fathername($fathername)
    {
        return $this->builder->where('father_name', $fathernamename);
    }

    public function caretakername($caretakername)
    {
        return $this->builder->where('caretaker_name', $caretakername);
    }
}
