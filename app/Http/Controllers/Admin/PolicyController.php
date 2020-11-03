<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app=Admin::find(1);
        return view('cpanel.policy',compact('app'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
    public function update(Request $request)
    {
        $app=Admin::find(1);
        if(isset($request->name)){
        $app->name=$request->name;
        }
        if(isset($request->email)){
        $app->email=$request->email;
        }
        if (isset($request->image)) {
            $ext = pathinfo($request->image->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->image->move('uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $app->image =$new_au;

            }
        if(isset($request->about_ar)){
        $app->about_ar=$request->about_ar;
        }
        if(isset($request->about_en)){
         $app->about_en=$request->about_en;
        }
        if(isset($request->snap)){
        $app->snap=$request->snap;
        }
        if(isset($request->emailapp)){
            $app->emailapp=$request->emailapp;
        }

        if(isset($request->telegram)){
            $app->telegram=$request->telegram;
        }
        if(isset($request->fb)){
            $app->fb=$request->fb;
        }

        if(isset($request->insta)){
            $app->insta=$request->insta;
        }

        if(isset($request->twitter)){
            $app->twitter=$request->twitter;
        }

        if(isset($request->watsapp)){
            $app->watsapp=$request->watsapp;
        }
        if(isset($request->phone_no)){
            $app->phone_no=$request->phone_no;
        }
        if(isset($request->services_en)){
            $app->services_en=$request->services_en;
        }
        if(isset($request->services_ar)){
            $app->services_ar=$request->services_ar;
        }

        if(isset($request->Mechanism_en)){
            $app->Mechanism_en=$request->Mechanism_en;
        }
        if(isset($request->Mechanism_ar)){
            $app->Mechanism_ar=$request->Mechanism_ar;
        }
      
        $app->update();

        Alert::success('نجاح العمية', '  تم التعديل  بنجاح '); 
        return redirect()->back();
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
