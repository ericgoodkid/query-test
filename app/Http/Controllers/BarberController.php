<?php

namespace App\Http\Controllers;

use App\Http\Requests\Barber\GetAllBarberRequest;
use App\Http\Requests\Barber\GetBarberRequest;
use App\Http\Requests\Barber\PatchBarberRequest;
use App\Http\Requests\Barber\StoreBarberRequest;
use App\Http\Resources\BarberResource;
use App\Services\BarberService;

class BarberController extends Controller
{
    private $oBarberService;
    public function __construct(BarberService $oBarberService)
    {
        $this->oBarberService = $oBarberService;
    }

    public function index(GetAllBarberRequest $oRequest)
    {
        return BarberResource::collection($this->oBarberService->index($oRequest->validated()));
    }

    /**
     * Do not remove the GetBranchRequest
     * It is used for validation
     */
    public function show(GetBarberRequest $oRequest, int $iId)
    {
        return new BarberResource($this->oBarberService->show($iId));
    }

    public function update(PatchBarberRequest $oRequest, int $iId)
    {
        return new BarberResource($this->oBarberService->update($iId, $oRequest->validated()));
    }

    public function store(StoreBarberRequest $oRequest)
    {
        return new BarberResource($this->oBarberService->store($oRequest->validated()));
    }
}
