<?php

namespace App\Http\Controllers;

use App\Http\Resources\BingoDrawResource;
use App\Services\BingoDrawService;

class BingoDrawController extends Controller
{
    private $oBingoDrawService;
    public function __construct(BingoDrawService $oBingoDrawService)
    {
        $this->oBingoDrawService = $oBingoDrawService;
    }

    /**
     * Use to generate a bingo card
     */
    public function store(int $iBingoNo)
    {
        return new BingoDrawResource($this->oBingoDrawService->store($iBingoNo));
    }

}
