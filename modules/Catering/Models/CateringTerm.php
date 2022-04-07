<?php

namespace Modules\Catering\Models;

use App\BaseModel;

class CateringTerm extends BaseModel
{
    protected $table = 'bravo_catering_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}
