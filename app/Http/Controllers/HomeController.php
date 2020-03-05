<?php

namespace App\Http\Controllers;


use App\Movie;
use App\Repositories\Contracts\MovieRepositoryInterface;

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

    public function index()
    {
        return view('home', [
            'movies' => $this->movieRepository->all()
        ]);
    }
}
