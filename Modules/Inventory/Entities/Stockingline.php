<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stockingline extends Model
{


    protected $table='stocktacking_lines';
    protected $guarded =['id'];
    
    protected static function newFactory()
    {
        return \Modules\Inventory\Database\factories\StockinglineFactory::new();
    }
}
