<?php
namespace Modules\Catering\Admin;

use Modules\Catering\Models\CateringDate;

class AvailabilityController extends \Modules\Catering\Controllers\AvailabilityController
{
    protected $cateringClass;
    /**
     * @var CateringDate
     */
    protected $cateringDateClass;
    protected $indexView = 'Catering::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/catering');
        $this->middleware('dashboard');
    }

}
