<?php

namespace App\Services\Supports;

use App\Services\dep_headService as SupportService;
use Illuminate\Support\Facades\Facade;

class dep_headService extends Facade
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
