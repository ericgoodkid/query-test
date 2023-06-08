<?php

namespace App\Http\Controllers;

use App\Constants\QueryConstants;
use App\Http\Requests\Query\GetQueryRequest;
use App\Http\Resources\QueryResource;
use App\Services\QueryService;

class QueryController extends Controller
{
    private $oQueryService;
    public function __construct(QueryService $oQueryService) 
    {
        $this->oQueryService = $oQueryService;
    }
    public function index(GetQueryRequest $oRequest)
    {
        $sNumber = (float) $oRequest->get(QueryConstants::AMOUNT);
        return new QueryResource($this->oQueryService->index($sNumber));
    }
}
