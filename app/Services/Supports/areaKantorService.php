<?php

namespace App\Services\Supports;

use App\Services\areaKantorService as SupportService;
use Illuminate\Support\Facades\Facade;

class areaKantorService extends Facade
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
