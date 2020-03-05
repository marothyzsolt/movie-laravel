<?php

namespace App\QueryFilters;

use Cerbero\QueryFilters\QueryFilters;

/**
 * Filter records based on query parameters.
 *
 */
class MovieFilter extends QueryFilters
{
    /**
     * Filter records based on the query parameter "year"
     *
     * @param $year
     * @return void
     */
    public function year($year)
    {
         $this->query->where('year', $year);
    }
}
