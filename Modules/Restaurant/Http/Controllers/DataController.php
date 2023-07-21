<?php

namespace Modules\Restaurant\Http\Controllers;

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
                'name' => 'restaurant_module',
                'label' => __('Restaurant::lang.restaurant'),
                'default' => false
            ]
        ];
    }

    /* Module menu*/
    public function modifyAdminMenu()
    {


        $business_id = session()->get('user.business_id');
        $module_util = new ModuleUtil();
        $commonUtil = new Util();
        $is_admin = $commonUtil->is_admin(auth()->user(), $business_id);
        $menu = Menu::instance('admin-sidebar-menu');
        $is_project_enabled = (boolean)$module_util->hasThePermissionInSubscription($business_id, 'project_module');

        if ($is_project_enabled) {
            if (auth()->user()->can('restaurant')) {
                $menu->dropdown(
                    __('restaurant::lang.restaurant'),
                    function ($sub) {
                        $sub->url(
                            action('\Modules\Restaurant\Http\Controllers\RestaurantController@index'),
                            __('restaurant::lang.submen1'),
                            ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'restaurant']
                        );
                        $sub->url(
                            action('\Modules\Restaurant\Http\Controllers\RestaurantController@index'),
                            __('restaurant::lang.submen2'),
                            ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'restaurant']
                        );

                        $sub->url(
                            action('\Modules\Restaurant\Http\Controllers\RestaurantController@index'),
                            __('restaurant::lang.submen3'),
                            ['icon' => 'fa fas fa-users-cog', 'active' => request()->segment(1) == 'restaurant']
                        );

                    },
                    ['icon' => 'fa fas fa-users-cog', 'style' => 'background-color: #fdfdfd !important;']

                )->order(30);

            }
        }
    }

    public function user_permissions()
    {
        return [
            [
                'value' => 'restaurant.create',
                'label' =>  __('restaurant::lang.creat'),
                'default' => false
            ],
            [
                'value' => 'restaurant.edit',
                'label' => __('restaurant::lang.edit'),
                'default' => false
            ],
            [
                'value' => 'restaurant.delete',
                'label' =>  __('restaurant::lang.delete'),
                'default' => false
            ],

            [
                'value' => 'restaurant.update',
                'label' => __('restaurant::lang.update'),
                'default' => false
            ],
        ];
    }
    public function index()
    {
        return view('Restaurant::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('restaurant::create');
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
        return view('restaurant::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('restaurant::edit');
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
