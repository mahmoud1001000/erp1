<?php

namespace Modules\Installment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Menu;

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
                'name' => 'installment_module',
                'label' => __('installment::lang.installment_module'),
                'default' => false
            ]
        ];
    }

    /* Module menu*/
    public function modifyAdminMenu()
    {



        $menu = Menu::instance('admin-sidebar-menu');
        if (auth()->user()->can('installment.view')) {
            $menu->dropdown(
                __('installment::lang.installment'),
                function ($sub) {
                    if (auth()->user()->can('installment.system_add')) {
                        $sub->url(
                            action('\Modules\Installment\Http\Controllers\InstallmentSystemController@index'),
                            __('installment::lang.installment_plan'),
                            ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'installment' && request()->segment(2) == 'system']
                        );
                    }

                    if (auth()->user()->can('installment.create')) {
                        $sub->url(
                            action('\Modules\Installment\Http\Controllers\SellController@index'),
                            __('installment::lang.customer_sells'),
                            ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'installment' && request()->segment(2) == 'sells']
                        );
                    }


                    $sub->url(
                        action('\Modules\Installment\Http\Controllers\CustomerController@index'),
                        __('installment::lang.customer'),
                        ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'installment' && request()->segment(2)=='customer' ]
                    );

                    $sub->url(
                        action('\Modules\Installment\Http\Controllers\InstallmentController@index'),
                        __('installment::lang.installment_report'),
                        ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(2) == 'installment' ]
                    );

                    $sub->url(
                        action('\Modules\Installment\Http\Controllers\CustomerController@contacts'),
                        __('installment::lang.installment_customer'),
                        ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(2) == 'contacts' ]
                    );

                },
                ['icon' => 'fa fa-cart-plus']

            )->order(32);

        }
            /*Menu::modify('admin-sidebar-menu', function ($menu) use ($background_color) {
                $menu->url(
                    action('\Modules\Installment\Http\Controllers\InstallmentController@index'),
                    __('installment::lang.installment'),
                    ['icon' => 'fa fas fa-user', 'active' => request()->segment(1) == 'installment', 'style' => 'background-color:' . $background_color]
                )
                    ->order(24);
            });*/


    }

    public function user_permissions()
    {
        return [

            [
                'value' => 'installment.view',
                'label' =>  __('installment::lang.view'),
                'default' => false
            ],

            [
                'value' => 'installment.create',
                'label' =>  __('installment::lang.create'),
                'default' => false
            ],
            [
                'value' => 'installment.edit',
                'label' => __('installment::lang.edit'),
                'default' => false
            ],
            [
                'value' => 'installment.delete',
                'label' =>  __('installment::lang.delete'),
                'default' => false
            ],

            [
                'value' => 'installment.add_Collection',
                'label' => __('installment::lang.add_Collection'),
                'default' => false
            ],

            [
                'value' => 'installment.delete_Collection',
                'label' => __('installment::lang.delete_Collection'),
                'default' => false
            ],



            [
                'value' => 'installment.system_add',
                'label' => __('installment::lang.system_add'),
                'default' => false
            ],
             [
                'value' => 'installment.system_edit',
                'label' => __('installment::lang.system_edit'),
                'default' => false
            ],
             [
                'value' => 'installment.system_delete',
                'label' => __('installment::lang.system_delete'),
                'default' => false
            ],

        ];
    }
    public function index()
    {
        return view('Installment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('installment::create');
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
        return view('installment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('installment::edit');
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
