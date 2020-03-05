<?php


namespace App\Repositories;


use App\Movie;
use App\QueryFilters\MovieFilter;
use App\Repositories\Contracts\MovieRepositoryInterface;
use App\Repositories\Eloquent\AbstractRepository;

class MovieRepository extends AbstractRepository implements MovieRepositoryInterface
{

    function model()
    {
        return Movie::class;
    }

    public function getMovieById($id)
    {
        $this->find($id);
    }

    public function allWithFilters(MovieFilter $movieFilter)
    {
        return $this
            ->model
            ->filterBy($movieFilter)
            ->select('movies.*',
                \DB::raw('AVG(acting) AS acting'),
                \DB::raw('AVG(visual) AS visual'),
                \DB::raw('AVG(story) AS story'),
                \DB::raw('AVG(fun) AS fun'),
                \DB::raw('AVG(logics) AS logics'),
                \DB::raw('AVG(fin) AS fin')
            )
            ->groupBy('movies.id')
            ->leftJoin('ratings', 'movies.id', '=', 'ratings.movie_id')->get();
    }
}
