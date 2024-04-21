<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
class CommonEnum extends Enum
{
    const PATH_UPLOAD = '/var/www/html/uploads/';
    const FOLDER_UPLOAD = '/uploads/index.php?folder=';
    const IMAGE_NOT_FOUND = '/images/graphics/imagenotfound.jpg';
    const DIC_ATTACH_FILE = 'images/fileattach/';

    const IMAGE_SIZE_SMALL = 'small';
    const IMAGE_SIZE_MEDIUM = 'medium';
    const IMAGE_SIZE_BIG = 'big';
    const IMAGE_SIZE_LARGE = 'large';
    const IMAGE_SIZE_XLARGE = 'xlarge';
    const LIMIT_DATA_PAGINATE = 9;
    const LIMIT_NEWS_PAGINATE = 10;
    const LIMIT_RELATED_NEWS = 6;

    const SORT_BY_NEW = 'moi-nhat';
    const SORT_BY_HIGHLIGHT = 'noi-bat';

    const HOME_BANNER_TOP = 'banner_top';
    const HOME_BANNER_BOTTOM = 'banner_bottom';
    const HOME_BANNER_LEFT = 'banner_left';
    const HOME_SECTION_DATA = 'section_data_';
    const HOME_SECTION_HD = 'section_hd';
    const HOME_SECTION_TTB = 'section_ttb';
    const HOME_SECTION_TTNB = 'section_ttnb';
    const HOME_SECTION_HDCG = 'section_hdcg';
    const HOME_SECTION_STB = 'section_stb';
    const HOME_SECTION_NN = 'section_nn';
    const HOME_SECTION_SEO = 'section_seo';

    const SEARCH_OPTION_ALL = 'tat-ca';
    const SEARCH_OPTION_SANPHAM = 'san-pham';
    const SEARCH_OPTION_BAIVIET = 'bai-viet';

    const CATEGORY_ID_SUCKHOE = 1;
    const CATEGORY_ID_SANPHAM = 24;
    const CATEGORY_ID_HOIDAPCHUYENGIA = 5;
    const CATEGORY_ID_PRODUCT = 0;

    const ELASTIC_POSTS_INDEX = 'posts_index';
    const ELASTICPOSTS_TYPE = '_doc';
    const ELASTIC_PRODUCT_INDEX = 'product_index';

    const FOLDER_ERROR = 'errors.';
    const COOKIE_USER_DATA = 'shopping_user';
    const COOKIE_USER_TIME = 86400 * 30;
    const COOKIE_USER_PATH = '/';
    const COOKIE_USER_TOKEN = 'myn2frontend_token';
    const COOKIE_CART_ITEM = 'shopping_cart_item';
    const COOKIE_UTM_SOURCE_LDP_DATA = 'n2utm_source_url_';
    const COOKIE_UTM_SOURCE_LDP_TIME = 2147483647;
    const COOKIE_FACEBOOK_ID = 'facebook_id';
    const LANDINGPAGE_CUSTOMER_YEAR = 2021;

    const FROM_MENU_ALL_PRODUCT = 'form_menu_all_product';

    const NHATNHAT_SOURCE_ID = 13;
    const FORM_TUVANMUAHANG = 1;
    const FORM_TUVANBENH = 2;
    const FORM_DATHANG = 3;
    const SHIPPING_FEE = 26000;
    const COEFFICIENT_POINT = 10000;
    const MIN_POINT = 50;
}
