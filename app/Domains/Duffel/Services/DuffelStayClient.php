<?php 

namespace App\Domains\Duffel\Services;

use App\Services\ApiServices\ApiClient;
use Illuminate\Http\Client\Response;

class DuffelStayClient extends ApiClient
{
    protected string $base;
    public function __construct(protected ApiClient $client){
         $this->base = config('services.duffel.sandbox.stay-url');
    }

    public function gets(string $url, mixed $query = []): Response  
    {
        return $this->client->get($this->base.'/'.ltrim($url, '/'), $query, $this->headers());
    }

    public function posts(string $url, mixed $data = []): Response 
    {
        return $this->client->post($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function puts(string $url, mixed $data = []): Response 
    {
        return $this->client->put($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function patchs(string $url, mixed $data = []): Response 
    {
        return $this->client->patch($this->base.'/'.ltrim($url, '/'), $data, $this->headers());
    }

    public function deletes(string $url, mixed $query = []): Response 
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