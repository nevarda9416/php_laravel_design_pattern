<?php
namespace app\Facades;

use Illuminate\Support\Facades\Facade;

class Process extends Facade {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'process';
    }

    /**
     *
     */
    public static function process()
    {
        echo 'Processing the custom facades in Laravel<br/>';
    }
}
