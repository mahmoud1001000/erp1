<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class busines_slug extends Model
{
    protected $guarded = ['id'];
public static function business($slug){

    $busines_id=busines_slug::where('slug','=',$slug)->value('business_id');
    if(is_null($busines_id))
        $busines_id=busines_slug::where('slug','=','azha')->value('business_id');
    return $busines_id;
}

}
