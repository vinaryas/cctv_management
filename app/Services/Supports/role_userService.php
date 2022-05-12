<?php

namespace App\Services\Supports;

use App\Services\role_userService as SupportService;
use Illuminate\Support\Facades\Facade;

class role_userService extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SupportService::class;
    }
}
