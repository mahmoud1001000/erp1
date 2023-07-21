<?php

namespace Modules\Partners\Entities;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    protected $guarded =['id'];
    protected $table ='partners';

    public static function forDropdown($business_id, $show_all = false){

        $result = partner::where('business_id', $business_id)->get();
        $data = $result->pluck('name', 'id');
        return $data;
    }
}
