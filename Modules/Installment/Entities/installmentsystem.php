<?php

namespace Modules\Installment\Entities;

use Illuminate\Database\Eloquent\Model;

class installmentsystem extends Model
{
    protected $guarded =['id'];
    protected $table ='installment_systems';

    public static function forDropdown($business_id, $show_all = false){

        $result = installmentsystem::where('business_id', $business_id)->get();
        $data = $result->pluck('name', 'id');
        return $data;
    }
}
