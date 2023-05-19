<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCrosssoutRequest;
use App\Http\Resources\BingoCrossedoutResource;
use App\Services\BingoCrossedOutService;

class BingoCrossedOutController extends Controller
{
    private $oCrossedOutService;
    public function __construct(BingoCrossedOutService $oCrossedOutService)
    {
        $this->oCrossedOutService = $oCrossedOutService;
    }

    /**
     * Use to generate a bingo card
     */
    public function update(
        PostCrosssoutRequest $oRequest
    ) {
        return new BingoCrossedoutResource(
            $this->oCrossedOutService->update(
                $oRequest->validated()
            )
        );
    }

}
