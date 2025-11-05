<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{

    private string $message;
    private ?array $data;
    private int $statusCode;

    public function __construct($message = "Se ha producido un error inesperado", $data = null, int $statusCode = 500)
    {
        $this->message = $message;
        $this->data = $data;
        $this->statusCode = $statusCode;
        parent::__construct($data);
    }

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->data,
            'message' => $this->message,
        ];
    }

    public function withResponse($request, $response): void
    {
        $response->setStatusCode($this->statusCode);
    }
}
