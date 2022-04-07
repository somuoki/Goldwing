<?php
namespace Modules\Catering;
use Modules\Catering\Models\Catering;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        if(!Catering::isEnable()) return [];
        return [
            'catering'=>[
                "position"=>45,
                'url'        => 'admin/module/catering',
                'title'      => __('Catering'),
                'icon'       => 'ion-md-restaurant',
                'permission' => 'catering_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/catering',
                        'title'      => __('All Catering Equipments'),
                        'permission' => 'catering_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/catering/create',
                        'title'      => __('Add new Catering Equipment'),
                        'permission' => 'catering_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/catering/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'catering_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => 'admin/module/catering/availability',
                        'title'      => __('Availability'),
                        'permission' => 'catering_create',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/catering/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'catering_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Catering::isEnable()) return [];
        return [
            'catering'=>Catering::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Catering::isEnable()) return [];
        return [
            'catering'=>[
                'class' => Catering::class,
                'name'  => __("Catering"),
                'items' => Catering::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if(Catering::isEnable()){
            $res['catering'] = [
                'url'   => route('catering.vendor.index'),
                'title'      => __("Manage Catering"),
                'icon'       => Catering::getServiceIconFeatured(),
                'position'   => 33,
                'permission' => 'catering_view',
                'children' => [
                    [
                        'url'   => route('catering.vendor.index'),
                        'title'  => __("All Catering"),
                    ],
                    [
                        'url'   => route('catering.vendor.create'),
                        'title'      => __("Add Catering"),
                        'permission' => 'catering_create',
                    ],
                    [
                        'url'        => route('catering.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'catering_create',
                    ],
                    [
                        'url'   => route('catering.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'catering_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Catering::isEnable()) return [];
        return [
            'form_search_catering'=>"\\Modules\\Catering\\Blocks\\FormSearchCatering",
            'list_catering'=>"\\Modules\\Catering\\Blocks\\ListCatering",
            'catering_term_featured_box'=>"\\Modules\\Catering\\Blocks\\CateringTermFeaturedBox",
        ];
    }
}
