<?php

namespace Modules\Installment\Entities;

use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    protected $guarded =['id'];
    protected $table ='installments';

}
