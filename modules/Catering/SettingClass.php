<?php

namespace Modules\Catering;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'catering',
                'title' => __("Catering Settings"),
                'position'=>20,
                'view'=>"Catering::admin.settings.catering",
                "keys"=>[
                    'catering_disable',
                    'catering_page_search_title',
                    'catering_page_search_banner',
                    'catering_layout_search',
                    'catering_location_search_style',
                    'catering_page_limit_item',

                    'catering_enable_review',
                    'catering_review_approved',
                    'catering_enable_review_after_booking',
                    'catering_review_number_per_page',
                    'catering_review_stats',

                    'catering_page_list_seo_title',
                    'catering_page_list_seo_desc',
                    'catering_page_list_seo_image',
                    'catering_page_list_seo_share',

                    'catering_booking_buyer_fees',
                    'catering_vendor_create_service_must_approved_by_admin',
                    'catering_allow_vendor_can_change_their_booking_status',
                    'catering_allow_vendor_can_change_paid_amount',
                    'catering_allow_vendor_can_add_service_fee',
                    'catering_search_fields',
                    'catering_map_search_fields',

                    'catering_allow_review_after_making_completed_booking',
                    'catering_deposit_enable',
                    'catering_deposit_type',
                    'catering_deposit_amount',
                    'catering_deposit_fomular',
                ],
                'html_keys'=>[

                ],
                'filter_demo_mode'=>[
                ]
            ]
        ];
    }
}
