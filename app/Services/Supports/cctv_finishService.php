<?php

namespace App\Services\Supports;

use App\Services\cctv_finishService as SupportService;
use Illuminate\Support\Facades\Facade;

class cctv_finishService extends Facade
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
