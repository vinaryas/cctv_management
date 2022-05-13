<?php

namespace App\Services\Supports;

use App\Services\approvalService as SupportService;
use Illuminate\Support\Facades\Facade;

class approvalService extends Facade
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
