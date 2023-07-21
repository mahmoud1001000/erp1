<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_barcode extends Model
{
    protected $guarded = ['id'];
    protected $table = 'product_barcode';
}
