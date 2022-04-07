<?php

namespace Modules\Catering\Models;

use Modules\Catering\Models\Catering;

class CateringTranslation extends Catering
{
    protected $table = 'catering_translations';

    protected $fillable = [
        'title',
        'content',
        'faqs',
        'address',
    ];

    protected $slugField     = false;
    protected $seo_type = 'catering_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'faqs'  => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }
    public function getRecordRoot(){
        return $this->belongsTo(Catering::class,'origin_id');
    }

    public static function boot() {
        parent::boot();
        static::saving(function($table)  {
            unset($table->extra_price);
            unset($table->price);
            unset($table->sale_price);
        });
    }
}
