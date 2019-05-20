<?php

namespace ckissi\tabler\Facades;

use Illuminate\Support\Facades\Facade;

class tabler extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tabler';
    }
}
