<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Utils\ModuleUtil;
use Menu;
class DataController extends Controller
{

    public function superadmin_package()
    {
        return [
            [
                'name' => 'inventory_module',
                'label' =>  __('inventory::lang.inventory'),
                'default' => false
            ]
        ];
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function modifyAdminMenu()
    {
        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();
        $is_mfg_enabled = (boolean)$module_util->hasThePermissionInSubscription($business_id, 'inventory_module');
        if ($is_mfg_enabled){
                Menu::modify('admin-sidebar-menu', function ($menu)  {
                   $menu->dropdown(
                       __('inventory::lang.inventory'),
                       function ($sub) {
                           if (auth()->user()->can('inventory.stocking_create')
                               ||auth()->user()->can('inventory.stocking_edit')
                               ||auth()->user()->can('inventory.stocking_delete')
                               ||auth()->user()->can('inventory.stocking_products')
                               ) {
                               $sub->url(
                                   action('\Modules\Inventory\Http\Controllers\InventoryController@index'),
                                   __('inventory::lang.inventory'),
                                   ['icon' => 'fa fas fa-user', 'active' => request()->segment(1) == 'inventory']
                               );
                           }
                             $sub->url(
                                   action('\Modules\Inventory\Http\Controllers\StocktackingController@details_report'),
                                   __('inventory::lang.stock_log'),
                                   ['icon' => 'fa fas fa-plus-circle', 'active' => request()->segment(1) == 'stocktacking' && request()->segment(2) == 'create']
                               );

                       },

                       ['icon' => 'fa fas fa-users-cog', 'style' => 'background-color: #fdfdfd !important;']
                   )->order(35);

                });

        }

    }

    public function index()
    {
        return view('inventory::index');
    }

    public function user_permissions()
    {
        return [
            [
                'value' => 'inventory.stocking_create', // which in database
                'label' =>  __('inventory::lang.stocking_create'), // use lang file in Resurces\lang\..... lang name\lang.php user value in 'creat'=>' sdhsdhsdhsdgs',
                'default' => false
            ],

            [
                'value' => 'inventory.stocking_edit',
                'label' => __('inventory::lang.stocking_edit'),
                'default' => false
            ],

            [
                'value' => 'inventory.stocking_delete',
                'label' =>  __('inventory::lang.stocking_delete'),
                'default' => false
            ],

            [
                'value' => 'inventory.stocking_products',
                'label' => __('inventory::lang.stocking_products'),
                'default' => false
            ],

            [
                'value' => 'inventory.showprice',
                'label' => __('inventory::lang.showprice'),
                'default' => false
            ],
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('inventory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('inventory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatestockTransafer(Request $request){
        $pos_settings = json_decode($request->session()->get('business.pos_settings'), true);
        $business = ['id' => 0,
            'accounting_method' => $request->session()->get('business.accounting_method'),
            'location_id' => 0,
            'pos_settings'=>[
                'allow_overselling'=>$pos_settings['allow_overselling']
            ]
        ];

        $this->transactionUtil->mapPurchaseSell();
    }
}
