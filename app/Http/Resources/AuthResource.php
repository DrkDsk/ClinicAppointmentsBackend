<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{

    private string $mesage;
    private int $statusCode;
    private string $token;

    private User $user;

    public function __construct(string $message, string $token, User $user, int $statusCode = 200)
    {
        $this->token = $token;
        $this->mesage = $message;
        $this->user = $user;
        $this->statusCode = $statusCode;
        parent::__construct([
            'user' => $this->user,
            'token' => $this->token,
        ]);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->mesage,
            'data' => [
                'token' => $this->token,
                'user' => $this->user->load('roles'),
            ],
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode($this->statusCode);
    }
}
