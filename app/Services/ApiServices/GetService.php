<?php 

namespace App\Services\ApiServices;
use Illuminate\Http\Client\Response;

class GetService 
{
    public function __construct(private ApiTransport $transport ){}
    public function execute(string $url, mixed $query = [], array $headers = []): Response 
    {
        return $this->transport->make($headers)->get($url, $query);
    }
}