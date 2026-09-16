<?php 

namespace App\Domains\Duffel\Services;

use App\Services\ApiServices\ApiClient;
use Illuminate\Http\Client\Response;

class DuffelAirClient extends ApiClient
{
    protected string $base;
    public function __construct(protected ApiClient $client){
         $this->base = config('services.duffel.sandbox.air-url');
    }

    public function gets(string $url, array $query = []): Response  
    {
        return $this->client->get($this->base.'/'.ltrim($url, '/'), $query, $this->headers());
    }

    public function posts(string $url, array $data = []): Response 
    {
        return $this->client->post($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function puts(string $url, array $data = []): Response 
    {
        return $this->client->put($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function patchs(string $url, array $data = []): Response 
    {
        return $this->client->patch($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function deletes(string $url, array $query = []): Response 
    {
        return $this->client->delete($this->base.'/'.ltrim($url, '/'), $query, $this->headers());
    }

    private function headers(): array
    {
        return [
            'Authorization' => 'Bearer' . config('services.duffel.sandbox.key'),
            'Content-Type'  => 'application/json'
        ];
    }
}