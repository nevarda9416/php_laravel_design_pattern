<?php

namespace App\Http\Controllers;

use App\Core\Business\TemplatesBusiness;
use App\Core\Utilities\PaginatorUtility;
use Illuminate\Http\Request;
use App\Core\Business\ProductBusiness;
use App\Core\Enums\CommonEnum;
use Illuminate\Support\Facades\DB;
use App\Helpers\HttpHelper\Response;
use Jenssegers\Agent\Agent;

class ProductController extends Controller
{
    /**
     * trang san pham
     */
    public function all()
    {
        $product_pending = [];
        $templates = TemplatesBusiness::getAllContent();
        $ProductBusiness = new ProductBusiness();
        $all_products = $ProductBusiness->get_all_products();
        if (!empty($all_products)) {
            foreach ($all_products as $key => $cate) {
                if (!empty($cate['Products'])) {
                    foreach ($cate['Products'] as $i => $product) {
                        if (isset($product['Status']) && $product['Status'] == 'coming_soon') {
                            $product_pending[] = $product;
                            unset($all_products[$key]['Products'][$i]);
                        }
                    }
                }
            }
        }


        $category_banners = $ProductBusiness->get_category_banners(CommonEnum::CATEGORY_ID_PRODUCT);
        $cate_banners = $category_banners['cate_banners'];
        $list_banners = DB::table('templates')->where('key', '=', 'keyproduct')->pluck('data_template')->first();
        $list_banners = json_decode($list_banners, true);
        return view('product.all', compact('templates', 'all_products', 'product_pending', 'cate_banners', 'list_banners'));
    }

    /**
     * Danh sach san pham theo category
     */
    public function index(Request $request, $slug)
    {
        $ProductBusiness = new ProductBusiness();
        $catesandsub = $ProductBusiness->get_all_categories();
        $category = ProductBusiness::getCategoryBySlug($catesandsub, $slug);
        if (count($category) > 0) {
            if ($category['ParentId'] > 0) {
                $showCategory = $category['ParentId'];
            } else {
                $showCategory = $category['Id'];
            }
            $breadcrumb_data = $ProductBusiness->get_products_breadcrumb($category['Id']);
            $curPage = !empty($request->get('page')) ? (int)$request->get('page') : 1;
            $sortby = !empty($request->get('sort')) ? trim($request->get('sort')) : '';
            $perPage = 50;
            $resultP = $ProductBusiness->GetListProductsByCategoryId($category, $curPage, $perPage, $sortby);
            $total_result = $resultP['total'];
            $dataProducts = $ProductBusiness->getProductPending($resultP['products']);
            $prductHtml = view('product.list')->with([
                'slug' => $slug,
                'category' => $category,
                'list_product' => $dataProducts['products'],
                'product_pending' => $dataProducts['product_pending'],
                'sortby' => $sortby,
                'catesandsub' => $catesandsub
            ])->render();
            $category_banners = $ProductBusiness->get_category_banners($category['Id']);
            $cate_banners = $category_banners['cate_banners'];
            $cate_seo = $category_banners['cate_seo'];
            $metaData['meta_title'] = isset($cate_seo['meta_title']) ? $cate_seo['meta_title'] : $category['Name'];
            $metaData['meta_keyword'] = isset($cate_seo['meta_keyword']) ? $cate_seo['meta_keyword'] : $category['Name'];
            $metaData['meta_description'] = isset($cate_seo['meta_description']) ? $cate_seo['meta_description'] : $category['Name'];
            $metaData['meta_image'] = isset($cate_seo['meta_image']) ? $cate_seo['meta_image'] : '';
            if ($sortby) {
                $urlP = '/san-pham/' . $slug . '?sort=' . $sortby . '&page=(:num)';
            } else {
                $urlP = '/san-pham/' . $slug . '?page=(:num)';
            }

            $paginator = new PaginatorUtility($total_result, $perPage, $curPage, $urlP);
            $html_done = $prductHtml;
            $list_banners = DB::table('templates')->where('key', '=', 'keyproduct-' . $category['Id'])->pluck('data_template')->first();
            $list_banners = json_decode($list_banners, true);
            return view('product.index', compact('slug', 'catesandsub', 'breadcrumb_data', 'html_done', 'total_result', 'cate_banners', 'category', 'showCategory', 'metaData', 'paginator', 'list_banners'));
        } else if ($slug === 'all') {
            $breadcrumb_data = [];
            $showCategory = 0;
            $resultP = $ProductBusiness->allProducts();
            $total_result = count($resultP);
            $dataProducts = $ProductBusiness->getProductPending($resultP);
            $prductHtml = view('product.list')->with([
                'slug' => $slug,
                'category' => $category,
                'list_product' => $dataProducts['products'],
                'product_pending' => $dataProducts['product_pending'],
                'sortby' => '',
                'catesandsub' => $catesandsub
            ])->render();
            $curPage = !empty($request->get('page')) ? (int)$request->get('page') : 1;
            $perPage = 50;
            $urlP = '/san-pham/' . $slug . '?page=(:num)';
            $paginator = new PaginatorUtility($total_result, $perPage, $curPage, $urlP);
            $html_done = $prductHtml;
            $category_banners = $ProductBusiness->get_category_banners(CommonEnum::CATEGORY_ID_PRODUCT);
            $cate_seo = $category_banners['cate_seo'];
            $metaData['meta_title'] = isset($cate_seo['meta_title']) ? $cate_seo['meta_title'] : $category['Name'];
            $metaData['meta_keyword'] = isset($cate_seo['meta_keyword']) ? $cate_seo['meta_keyword'] : $category['Name'];
            $metaData['meta_description'] = isset($cate_seo['meta_description']) ? $cate_seo['meta_description'] : $category['Name'];
            $metaData['meta_image'] = isset($cate_seo['meta_image']) ? $cate_seo['meta_image'] : '';
            $cate_banners = $category_banners['cate_banners'];
            $list_banners = DB::table('templates')->where('key', '=', 'keyproduct')->pluck('data_template')->first();
            $list_banners = json_decode($list_banners, true);
            return view('product.index', compact('slug', 'catesandsub', 'breadcrumb_data', 'html_done', 'total_result', 'cate_banners', 'category', 'showCategory', 'metaData', 'paginator', 'list_banners'));
        } else {
            return redirect()->to('/', 301);
        }
    }

    /**
     * Chi tiet san pham
     */
    public function detail($slug, $product_id = 1)
    {
        $ProductBusiness = new ProductBusiness();
        // Call API get product detail
        $productDetail = app(Response::class)->responseData('/api/products/slug/' . $slug);
        $productDetailData = $productDetail['data'][0]??[];
//dd($productDetailData);
/*
        $product_detail = $ProductBusiness->get_product_detail($product_id);
        if (!empty($product_detail)) {
            if ($product_detail['SeoId'] != $slug) {
                return redirect()->to('/san-pham/' . $product_detail['SeoId'] . '-' . $product_id . '.html', 301);
            }

            $promotions = [];
            $checkIds = [];
            $promotionProducts = ProductBusiness::getPromotionByProducts([$product_id]);
            if (count($promotionProducts) > 0) {
                foreach ($promotionProducts as $promotion) {
                    $product_detail['promotion'] = $promotion;
                    $checkIds[$promotion['promotionId']] = $promotion['promotionId'];
                }
            }

            $promotions = ProductBusiness::getPromotionByProductId($product_id);
            if (count($promotions) > 0) {
                foreach ($promotions as $k => $promotion) {
                    if (isset($checkIds[$promotion['id']])) {
                        unset($promotions[$k]);
                    }
                }
            }

            $breadcrumb_data = $ProductBusiness->get_products_breadcrumb($product_detail['CategoryId']);
            $relatedProducts = $ProductBusiness->get_related_products($product_id);
            $html_list_product = view('product.relate')->with(['list_product' => $relatedProducts])->render();
            $metaData['meta_title'] = isset($product_detail['MetaTitle']) ? $product_detail['MetaTitle'] : $product_detail['Name'];
            $metaData['meta_keyword'] = isset($product_detail['MetaKeyword']) ? $product_detail['MetaKeyword'] : $product_detail['ShortDescription2'];
            $metaData['meta_description'] = isset($product_detail['MetaDescription']) ? $product_detail['MetaDescription'] : $product_detail['ShortDescription2'];
            $metaData['meta_image'] = isset($product_detail['ThumbnailUrl']) ? url($product_detail['ThumbnailUrl']) : '';
            if (isset($product_detail['ProductSkus']) && count($product_detail['ProductSkus']) > 0) {
                $first_product_skus = $product_detail['ProductSkus'][0];
                if (isset($first_product_skus['Medias']) && count($first_product_skus['Medias']) > 0) {
                    foreach ($first_product_skus['Medias'] as $i => $v) {
                        $rename_img = $ProductBusiness->rename_img($v['Url']);
                        $first_product_skus['Medias'][$i]['small'] = $rename_img[CommonEnum::IMAGE_SIZE_SMALL];
                        $first_product_skus['Medias'][$i]['large'] = $rename_img[CommonEnum::IMAGE_SIZE_LARGE];
                        $first_product_skus['Medias'][$i]['xlarge'] = $rename_img[CommonEnum::IMAGE_SIZE_XLARGE];
                    }
                }
            }
*/
        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('product.mobile.detail', compact('slug', 'breadcrumb_data', 'product_detail', 'first_product_skus', 'html_list_product', 'metaData', 'promotions'));
        } else {
            return view('product.detail', compact('productDetailData'));//, 'breadcrumb_data', 'product_detail', 'first_product_skus', 'html_list_product', 'metaData', 'promotions'));
        }

//            if (count($product_detail) > 0 && $product_detail['Status'] == 'normal') {
//                return view('product.detail', compact('slug', 'breadcrumb_data', 'product_detail', 'first_product_skus', 'html_list_product', 'metaData', 'promotions'));
//            } else {
//                return view('product.detail_m', compact('slug', 'breadcrumb_data', 'product_detail', 'first_product_skus', 'html_list_product', 'metaData', 'promotions'));
//            }
//        } else {
//            return redirect()->to('/', 301);
//        }
    }

    public function detailPopup($product_id)
    {
        $data = $this->getProductDetailById($product_id);
        $product_detail = $data[0];
        if ($product_detail) {
            $promotions = ProductBusiness::getPromotionByProducts([$product_id]);
            if (count($promotions) > 0) {
                foreach ($promotions as $promotion) {
                    $product_detail['promotion'] = $promotion;
                }
            }
        }

        $first_product_skus = $data[1];
        $returnHTML = view('product.detail-popup')->with(['first_product_skus' => $first_product_skus, 'product_detail' => $product_detail])->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function highlightProduct($postId = 0)
    {
        $productBusiness = new \App\Core\Business\ProductBusiness();
        $list_product = $productBusiness->getAllListHighlightProducts($postId);
        $returnHTML = '';
        $success = false;
        if (count($list_product) > 0) {
            $success = true;
            foreach ($list_product as $product) {
                $returnHTML .= view('product.item_ajax')->with(['product' => $product, 'is_ajax' => 1])->render();
            }
        }
        return response()->json(array('success' => $success, 'html' => $returnHTML, 'data' => $list_product));
    }

    private function getProductDetailById($product_id)
    {
        $ProductBusiness = new ProductBusiness();
        $product_detail = $ProductBusiness->get_product_detail($product_id);
        if (count($product_detail) > 0) {
            if (isset($product_detail['ProductSkus']) && count($product_detail['ProductSkus']) > 0) {
                $first_product_skus = $product_detail['ProductSkus'][0];
                if (isset($first_product_skus['Medias']) && count($first_product_skus['Medias']) > 0) {
                    foreach ($first_product_skus['Medias'] as $i => $v) {
                        $rename_img = $ProductBusiness->rename_img($v['Url']);
                        $first_product_skus['Medias'][$i]['small'] = $rename_img[CommonEnum::IMAGE_SIZE_SMALL];
                        $first_product_skus['Medias'][$i]['large'] = $rename_img[CommonEnum::IMAGE_SIZE_LARGE];
                        $first_product_skus['Medias'][$i]['xlarge'] = $rename_img[CommonEnum::IMAGE_SIZE_XLARGE];
                    }
                }
            }
        }
        return [$product_detail, $first_product_skus];
    }
}
