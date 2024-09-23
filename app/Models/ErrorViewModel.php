<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorViewModel extends Model
{
    public ?string $requestId;

    public function __construct(?string $requestId = null)
    {
        $this->requestId = $requestId;
    }

    public function showRequestId(): bool
    {
        return !empty($this->requestId);
    }
}
