<?php

namespace App\Services\Validations;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

interface CreateValidationInterface
{
    /**
     * @param Request $request
     *
     * @return array
     * @throws ValidationException
     */
    public function validateCreate(Request $request): array;
}
