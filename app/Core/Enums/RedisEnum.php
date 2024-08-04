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

    const REDIS_DB = 1;

    const GET_HTML_HEADER = 'html_header_v2';

    const GET_HTML_FOOTER = 'html_footer_v2';
}
