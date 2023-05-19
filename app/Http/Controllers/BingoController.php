<?php

namespace App\Http\Controllers;

use App\Http\Resources\BingoResource;
use App\Services\BingoService;

class BingoController extends Controller
{
    private $oBingoService;
    public function __construct(BingoService $oBingoService)
    {
        $this->oBingoService = $oBingoService;
    }

    /**
     * Use to generate a bingo card
     */
    public function show(int $iBingoNo)
    {
        return new BingoResource($this->oBingoService->show($iBingoNo));
    }

    public function store()
    {
        return new BingoResource($this->oBingoService->store());
    }

    public function index()
    {
        return BingoResource::collection($this->oBingoService->index());
    }

}
