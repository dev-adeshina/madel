<?php 

namespace App\Domains\Duffel\Flight\Services;

use App\Domains\Duffel\Flight\DTOs\OfferRequestData;
use App\Helpers\Casitfy;
use App\Domains\Duffel\Services\DuffelAirClient;
use Illuminate\Http\Client\Response;

class OfferRequestService {
    public function __construct(protected DuffelAirClient $client){}

    public function create(OfferRequestData $data): Response
    {
        return $this->client->post('offer_requests', $data->toArray());
    }
    
}