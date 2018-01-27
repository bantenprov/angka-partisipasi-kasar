<?php namespace Bantenprov\APKasar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The APKasar facade.
 *
 * @package Bantenprov\APKasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APKasar extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ap-kasar';
    }
}
