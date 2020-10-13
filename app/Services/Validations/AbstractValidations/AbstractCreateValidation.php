<?php

namespace App\Services\Validations\AbstractValidations;

use App\Services\Validations\CreateValidationInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

abstract class AbstractCreateValidation  implements CreateValidationInterface
{
    use ValidatesRequests;

    /**
     * @var array
     */
    protected static $create_rules = [];

    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function validateCreate(Request $request): array
    {
        return $this->validate($request, $this->getCreateRules($request));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function getCreateRules(Request $request): array
    {
        return static::$create_rules;
    }
}
