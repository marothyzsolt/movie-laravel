<?php

namespace App;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Movie
 *
 * @property int $id
 * @property string $name
 * @property int $year
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Movie whereYear($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use FiltersRecords;

    public $timestamps = false;

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getStarsAttribute()
    {
        return round(collect(
            [
                $this->acting,
                $this->visual,
                $this->story,
                $this->fun,
                $this->logics,
                $this->fin
            ])->avg(), 1);
    }
}
