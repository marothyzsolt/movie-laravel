<?php


namespace App\Repositories\Contracts;


interface MovieRepositoryInterface extends RepositoryInterface
{
    /**
     * Find movie by ID
     * @param $id
     * @return mixed
     */
    public function getMovieById($id);
}
