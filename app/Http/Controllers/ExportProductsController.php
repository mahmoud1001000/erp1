<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Business;
use App\BusinessLocation;
use App\Category;
use App\Product;
use App\TaxRate;
use App\Transaction;
use App\Unit;
use App\Utils\ModuleUtil;
use App\Utils\ProductUtil;
use App\Variation;
use App\VariationValueTemplate;
use DB;
//use Excel;
use Illuminate\Http\Request;
use App\Exports\ExportProducts;
use Maatwebsite\Excel\Facades\Excel;


class ExportProductsController extends Controller
{
     public function export() 
    {
       
        return Excel::download(new ExportProducts, 'products.xlsx');
    }
}