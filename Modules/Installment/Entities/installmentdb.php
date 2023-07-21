<?php

namespace Modules\Installment\Entities;

use Illuminate\Database\Eloquent\Model;

class installmentdb extends Model
{
    protected $guarded =['id'];
    protected $table ='installment_db';
}
