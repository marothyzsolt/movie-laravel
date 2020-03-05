<?php

namespace App\Http\Controllers;


use App\Movie;
use App\QueryFilters\MovieFilter;
use App\Repositories\Contracts\MovieRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var MovieRepositoryInterface
     */
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->middleware('auth');
        $this->movieRepository = $movieRepository;
    }

    public function index(MovieFilter $movieFilter)
    {
        return view('home', [
            'movies' => $this->movieRepository->allWithFilters($movieFilter)
        ]);
    }
}
