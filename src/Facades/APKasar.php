<?php namespace Bantenprov\PdrbHargaDasar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PdrbHargaDasar facade.
 *
 * @package Bantenprov\PdrbHargaDasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PdrbHargaDasar extends Facade
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
