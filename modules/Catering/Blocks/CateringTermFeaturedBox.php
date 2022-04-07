<?php
namespace Modules\Catering\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Core\Models\Terms;

class CateringTermFeaturedBox extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Desc')
                ],
                [
                    'id'           => 'term_catering',
                    'type'         => 'select2',
                    'label'        => __('Select term catering'),
                    'select2'      => [
                        'ajax'     => [
                            'url'      => route('catering.admin.attribute.term.getForSelect2', ['type' => 'catering']),
                            'dataType' => 'json'
                        ],
                        'width'    => '100%',
                        'multiple' => "true",
                    ],
                    'pre_selected' => route('catering.admin.attribute.term.getForSelect2', [
                        'type'         => 'catering',
                        'pre_selected' => 1
                    ])
                ],
            ],
            'category'=>__("Service Catering")
        ]);
    }

    public function getName()
    {
        return __('Catering: Term Featured Box');
    }

    public function content($model = [])
    {
        if (empty($term_catering = $model['term_catering'])) {
            return "";
        }
        $list_term = Terms::whereIn('id',$term_catering)->get();
        $model['list_term'] = $list_term;
        return view('Catering::frontend.blocks.term-featured-box.index', $model);
    }

    public function contentAPI($model = []){
        $model['list_term'] = null;
        if (!empty($term_catering = $model['term_catering'])) {
            $list_term = Terms::whereIn('id',$term_catering)->get();
            if(!empty($list_term)){
                foreach ( $list_term as $item){
                    $model['list_term'][] = [
                        "id"=>$item->id,
                        "attr_id"=>$item->attr_id,
                        "name"=>$item->name,
                        "image_id"=>$item->image_id,
                        "image_url"=>get_file_url($item->image_id,"full"),
                        "icon"=>$item->icon,
                    ];
                }
            }
        }
        return $model;
    }
}
