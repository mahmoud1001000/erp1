<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventoryTransactions extends Model
{


    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Inventory\Database\factories\InventoryTransactionsFactory::new();
    }
}
