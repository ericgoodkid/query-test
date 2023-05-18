<?php

namespace App\Http\Controllers;

use App\Http\Requests\Branch\GetAllBranchRequest;
use App\Http\Requests\Branch\GetBranchRequest;
use App\Http\Requests\Branch\PatchBranchRequest;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Resources\BranchResource;
use App\Services\BranchService;

class BranchController extends Controller
{
    private $oBranchService;
    public function __construct(BranchService $oBranchService)
    {
        $this->oBranchService = $oBranchService;
    }

    public function index(GetAllBranchRequest $oRequest)
    {
        return BranchResource::collection($this->oBranchService->index($oRequest->validated()));
    }

    /**
     * Do not remove the GetBranchRequest
     * It is used for validation
     */
    public function show(GetBranchRequest $oRequest, int $iId)
    {
        return new BranchResource($this->oBranchService->show($iId));
    }

    public function update(PatchBranchRequest $oRequest, int $iId)
    {
        return new BranchResource($this->oBranchService->update($iId, $oRequest->validated()));
    }

    public function store(StoreBranchRequest $oRequest)
    {
        return new BranchResource($this->oBranchService->store($oRequest->validated()));
    }
}
