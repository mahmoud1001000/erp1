<?php

namespace Modules\Partners\Http\Controllers;
use App\Category;
use App\User;
use App\Utils\ModuleUtil;
use App\Utils\TransactionUtil;
use Illuminate\Routing\Controller;
use Menu;
use Modules\Essentials\Entities\EssentialsTodoComment;
use Modules\Essentials\Entities\DocumentShare;
use Illuminate\Support\Facades\DB;
use Modules\Essentials\Entities\ToDo;
use Modules\Essentials\Entities\EssentialsHoliday;
use Modules\Essentials\Entities\EssentialsLeave;
use Modules\Essentials\Entities\Reminder;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
	 
	 public function superadmin_package()
    {
        return [
            [
                'name' => 'partners_module',
                'label' => "وحدة الشركاء",
                'default' => false
            ]
        ];
    }
     public function modifyAdminMenu()
    {

        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();
        $background_color = '#fff !important';
        $is_mfg_enabled = (boolean)$module_util->hasThePermissionInSubscription($business_id, 'partners_module');
        if ($is_mfg_enabled){
            if(auth()->user()->can('partner_view')){
                Menu::modify('admin-sidebar-menu', function ($menu) use ($background_color) {
                    $menu->url(
                        action('\Modules\Partners\Http\Controllers\PartnersController@index'),
                        __('partners::lang.partners'),
                        ['icon' => 'fa fas fa-user', 'active' => request()->segment(1) == 'partners']
                    )
                        ->order(7);
                });
            }
        }




       /* Menu::modify('admin-sidebar-menu', function ($menu) use ($background_color) {
            $menu->dropdown(
                __('partners::lang.pateners_assets'),
                function ($sub) {
                                    $sub->url(
                                            action('\Modules\Partners\Http\Controllers\PartnersController@index'),
                                            __('partners::lang.pateners'),
                                            ['icon' => 'fa fas fa-address-book', 'active' => request()->segment(2) == 'partners', 'style' => 'background-color:#fff !important']
                                          );
                                    $sub->url(
                                            action('\Modules\Partners\Http\Controllers\AssetsController@index'),
                                            __('partners::lang.assets'),
                                            ['icon' => 'fa fas fa-user', 'active' => request()->segment(2) == 'assets', 'style' => 'background-color:#fff !important']
                                         );

                               },
                  ['icon' => 'fa fas  fa-users']
                )->order(7);

        });*/





        }
     public function user_permissions()
    {
        return [
            [
                'value' => 'Partners.view',
                'label' =>  __('partners::lang.partner_view'),
                'default' => false
            ],
            [
                'value' => 'partner.create',
                'label' =>  __('partners::lang.partner_create'),
                'default' => false
            ],
            [
                'value' => 'partner.delete',
                'label' =>  __('partners::lang.partner_delete'),
                'default' => false
            ],
            [
                'value' => 'partner.edit',
                'label' => __('partners::lang.partner_edit'),
                'default' => false
            ],

            [
                'value' => 'partner.payment_view',
                'label' => __('partners::lang.payment_view'),
                'default' => false
            ],
            [
                'value' => 'partner.payment_edit',
                'label' => __('partners::lang.payment_edit'),
                'default' => false
            ],
            [
                'value' => 'partner.payment_delete',
                'label' => __('partners::lang.payment_delete'),
                'default' => false
            ],

        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function index()
    {
        return view('partners::index');
    }
    public function create()
    {
        return view('partners::create');
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
        return view('partners::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('partners::edit');
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
}
