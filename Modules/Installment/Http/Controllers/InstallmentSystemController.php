<?php

namespace Modules\Installment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Installment\Entities\installmentsystem;
use Yajra\DataTables\DataTables;


class InstallmentSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(){

    }


    public function index(Request $request)
    {

       /* if($request->ajax()) {
            $business_id=auth()->user()->business_id;
            $data='<tr><td colspan="7">No data Found</td></tr>';

            $system=installmentsystem::where('business_id',$business_id)->get();
            foreach ($system as $row){
                $data .= '<tr>';
                $data .= '<td>'.$row->name.'</td>';
                $data .= '<td>'.$row->number.'</td>';
                $data .= '<td>'.$row->period.'</td>';
                $data .= '<td>'.__('installment::lang.'.$row->type).'</td>';
                $data .= '<td>'.$row->benefit.'</td>';
                $data .= '<td>'.$row->benefit_type.'</td>';
                $data .= '<td>'.$row->description.'</td>';

                $data .= '</tr>';

            }

       if (auth()->user()->can('installment.delete_Collection')) {
            $output = [ 'success' => false,
                'msg' =>'عفوالا تملك الصلاحية لحذف قسط'
            ];
            return $output;
        }

            return $data;
        }*/

        if($request->ajax()) {
            $business_id = auth()->user()->business_id;
            $system = installmentsystem::where('business_id', $business_id)
                    ->select('name','number','period','type','benefit','benefit_type','description','id')
                    ->orderby('id');
            return DataTables::of($system)
                ->addcolumn(
                    'action',

                    '@if (auth()->user()->can(\'installment.system_edit\'))
                        <button data-href="{{action(\'\Modules\Installment\Http\Controllers\InstallmentSystemController@edit\', [$id])}}" class="btn btn-xs btn-primary edit_button"><i class="glyphicon glyphicon-edit"></i> @lang("messages.edit")</button>
                    &nbsp;@endif
                     @if (auth()->user()->can(\'installment.system_delete\'))
                          <button data-href="{{action(\'\Modules\Installment\Http\Controllers\InstallmentSystemController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>
                     @endif
                     '

                )
                ->editcolumn('type',function ($row) {
                  return __('installment::lang.' . $row->type);
                                                      })
                ->editcolumn('benefit_type',function ($row){
                     return __('installment::lang.' . $row->benefit_type);
                                                              })
                ->editcolumn('benefit',function ($row){
                    return '%'.$row->benefit;
                })
                ->removeColumn('id')
                ->rawColumns([7])
                ->make(false);

        }


        return view('installment::systems.index');
    }


    /**
    get installment system data by ajax
     */

    public function getsystemdata(Request $request){

        $data=installmentsystem::where('id','=',$request->id)->first();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('installment::systems.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $business_id=auth()->user()->business_id;

        $input=$request->except('_token');
        $input=array_merge(['business_id'=>$business_id],$input);


        $data=installmentsystem::create($input);

        $output = [ 'success' => true,
                    'data' => $data,
                    'msg' => __("brand.added_success")
        ];

    return $output;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=installmentsystem::where('id','=',$id)->first();
        return view('installment::systems.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data=installmentsystem::where('id','=',$id)->first();
        $data->name=$request->name;
        $data->number=$request->number;
        $data->period=$request->period;
        $data->type=$request->type;
        $data->benefit=$request->benefit;
        $data->benefit_type=$request->benefit_type;
        $data->description=$request->description;
        $data->save();
        $output = [ 'success' => true,
            'data' => $data,
            'msg' => __("installment::lang.system_updated_success")
        ];

        return $output;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        try {
            $business_id = request()->user()->business_id;

            $data = installmentsystem::where('business_id', $business_id)->findOrFail($id);
            $data->delete();

            $output = ['success' => true,
                'msg' => __("installment::lang.deleted_success")
            ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = ['success' => false,
                'msg' => __("messages.something_went_wrong")
            ];
        }

        return $output;
    }
}
