<?php

namespace App\Http\Controllers\Api\v1\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Son;
use App\Models\Arrival;
use App\Models\transportor;
use App\Models\Notification;


class ArrivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allarrival($id)
    {
        $Arrival=Arrival::with(['rating'])->where('son_id', $id)->get();
        $success['items'] = $Arrival;
        return apiSuccess($success);
    }

    public function profilestudent($id)
    {
//       'arrival'
        $Son=Son::with(['parents','school','arrivallast.rating'])->where('Is_agree',1)->where('id',$id)->get();
        $success['items'] = $Son;
        return apiSuccess($success);
    }
    public function AllarrivalMyStudent()
    {
       $bus=User::where('id',auth('api')->user()->id)->get();

        $son=Son::where('transport_id',$bus->no_bus)->get();
        foreach ($son as $item) {
            $Arrival=Arrival::where('son_id', $item->id)->orderBy('id', 'desc')->latest()->take(1);
            $success['items'] = $Arrival;
            return apiSuccess($success);
        }

}


public function adress_school_parent_bus($id)
{
    $Son=Son::with(['school' => function($query) {
        $query->select('id', 'latitude','longitude');},

           'parents' => function($query) {
        $query->select('id', 'latitude','longitude');},

             'transportor' => function($query) {
        $query->select('id', 'start_latitude','start_longitude');}

    ])->where('id',$id)->get();

    $success['items'] = $Son;
    return apiSuccess($success);



}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function ConfirmGoing(Request $request, $id)
    {
        $ConfirmGoing=Arrival::where('id', $id)->first();
        $ConfirmGoing->Sure_go=1;
        $ConfirmGoing->update();
        $success['items'] = $ConfirmGoing;
        return apiSuccess($success,200,'smartbus.Go_has_been_confirmed');
    }
    public function ConfirmReturn(Request $request, $id)
    {
        $ConfirmGoing=Arrival::where('id', $id)->first();
        $ConfirmGoing->Sure_return=1;
        $ConfirmGoing->update();
        $success['items'] = $ConfirmGoing;
        return apiSuccess($success,200,'smartbus.Return_has_been_confirmed');

    }

    public function Firstlayoutdriver()
    {
    
        $date = Carbon::now();
        $transportor=transportor::where('driver_id',auth('api')->user()->id)->first();
    
        $son=Son::where('transport_id',$transportor->id)->where('Is_agree',1)->get();
        foreach ($son as $item) {
            $Arrival=Arrival::with(['student.school' => function($query) {
        $query->select('id', 'latitude','longitude');},'student.parents' => function($query) {
            $query->select('id', 'latitude','longitude');},
    
                 'student.transportor' => function($query) {
            $query->select('id', 'start_latitude','start_longitude');}])->where('date', $date->toFormattedDateString() )->get();
            $success['items'] = $Arrival;
            return apiSuccess($success);
        }
         return apiSuccess(null,200,'not found');
    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
