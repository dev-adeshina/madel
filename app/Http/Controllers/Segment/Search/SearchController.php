<?php

namespace App\Http\Controllers\Segment\Search;

use App\Domains\Duffel\Flight\Services\OfferRequestService;
use App\Helpers\Responsify;
use App\Http\Controllers\Controller;
use App\Http\Requests\Duffel\OfferRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class SearchController extends Controller
{   
    public function __construct(protected OfferRequestService $service){}
    public function __invoke(OfferRequest $request): JsonResponse 
    {
        try{
           
            $offers =  $this->service->create($request->toDTO());
            return Responsify::success($offers);
        }catch(Throwable $e) {
            report($e);
            return Responsify::error(message: 'Oops! some error occur');
        }
    }
}
