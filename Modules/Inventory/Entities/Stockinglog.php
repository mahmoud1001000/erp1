<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stockinglog extends Model
{

    protected $table='stocking_logs';
    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Inventory\Database\factories\StockingLogFactory::new();
    }
}
