<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Rating
 *
 * @property int $id
 * @property int $movie_id
 * @property int $user_id
 * @property int $acting
 * @property int $visual
 * @property int $story
 * @property int $fun
 * @property int $logics
 * @property int $fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereActing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereFun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereLogics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereStory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereVisual($value)
 * @mixin \Eloquent
 */
class Rating extends Model
{
    use SoftDeletes;

    //protected $fillable = ['movie_id', 'acting', 'user_id'];
    //protected $fillable = ['*']; = protected $guarded = [];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    private function calculateAvg()
    {
        return collect([
            $this->acting,
            $this->visual,
            $this->story,
            $this->fun,
            $this->logics,
            $this->fin
        ])->avg();
    }

    public function getAvgAttribute()
    {
        return round($this->calculateAvg(), 1);
    }

}
