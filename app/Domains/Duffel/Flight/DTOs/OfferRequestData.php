<?php 

namespace App\Domains\Duffel\Flight\DTOs;


class OfferRequestData {
    
    public function __construct(
        public array $slices,
        public array $passengers,
        public array $privateFares = [],
        public int $maxConnections = 0,
        public bool $includeSplitTicket = false,
        public string $cabinClass = 'economy',
        public array $airlineCreditIds = [],
    ){}


    public static function fromArray(array $data): self
    {
        return new self(
            slices: $data['slices'],
            passengers: $data['passengers'],
            privateFares: $data['private_fares'] ?? [],
            maxConnections: $data['max_connections'] ?? 0,
            includeSplitTicket: $data['include_split_ticket'] ?? false,
            cabinClass: $data['cabin_class'] ?? 'economy',
            airlineCreditIds: $data['airline_credit_ids'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'data' => [
                'slices' => $this->slices,
                'private_fares' => $this->privateFares,
                'passengers' => $this->passengers,
                'max_connections' => $this->maxConnections,
                'include_split_ticket' => $this->includeSplitTicket,
                'cabin_class' => $this->cabinClass,
                'airline_credit_ids' => $this->airlineCreditIds,
            ],
        ];
    }

    
}