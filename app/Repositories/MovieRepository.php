<?php


namespace App\Repositories;


use App\Movie;
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

    public function all($columns = array('*'))
    {
        return $this->model
            ->with('ratings')
            ->withCount([
                'ratings as acting' => function($query) {
                    $query->select(\DB::raw('avg(acting)'));
                },
                'ratings as visual' => function($query) {
                    $query->select(\DB::raw('avg(visual)'));
                },
                'ratings as story' => function($query) {
                    $query->select(\DB::raw('avg(story)'));
                },
                'ratings as fun' => function($query) {
                    $query->select(\DB::raw('avg(fun)'));
                },
                'ratings as logics' => function($query) {
                    $query->select(\DB::raw('avg(logics)'));
                },
                'ratings as fin' => function($query) {
                    $query->select(\DB::raw('avg(fin)'));
                },
            ])->get();
    }
}
