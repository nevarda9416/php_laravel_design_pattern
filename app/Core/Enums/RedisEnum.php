<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
class RedisEnum extends Enum
{
    const PRODUCT_DETAIL_KEY = 'ProductDetail_';
}
