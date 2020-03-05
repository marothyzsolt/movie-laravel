<?php


namespace App\Services;


use App\Services\Contracts\MafabServiceInterface;
use PoLaKoSz\Mafab\Search;

class MafabService implements MafabServiceInterface
{
    /**
     * @var Search
     */
    private $mafabSearch;

    public function __construct(Search $mafabSearch)
    {
        $this->mafabSearch = $mafabSearch;
    }

    public function search(string $movieName)
    {
        return $this->mafabSearch->search($movieName);
    }
}
