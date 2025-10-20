<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{

    private string $message;
    private array $data;
    private int $statusCode;

    public function __construct($message = "Se ha producido un error inesperado", $data = [], int $statusCode = 500)
    {
        $this->message = $message;
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function toArray(Request $request): array
    {
        $response = [
            "message" => $this->message
        ];

        if (count($this->data)) {
           $response['data'] = $this->data;
        }

        return $response;
    }

    public function withResponse($request, $response): void
    {
        $response->setStatusCode($this->statusCode);
    }
}
