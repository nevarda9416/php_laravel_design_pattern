<?php

namespace App\Helpers\ProductHelper;

class Status
{
    public static function shout(string $string)
    {
        switch ($string) {
            case 'in_stock':
                $html = '<span style="color: #12bd1b;">✔ Có hàng</span>';
                break;
            case 'out_of_stock':
            default:
                $html = '<span style="color: #de0b00;height: 25px;"> Hết hàng</span>';
                break;
        }

        return $html;
    }
}
