@extends('cpanel.layout.index')
@section('content')
  @include('sweetalert::alert') 
 
                  
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="portlet light ">
                                          
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
  {!!  Form::open(['url' => ['admin/Changesettingadmin'] ,'method' => 'POST','files' => true]) !!}  
                                                            <div class="form-group">
                                                                <label class="control-label"> الاسم </label>
                                                                <span class="required"> * </span>
                                                                <input type="text" value="{{$admin->name}}" class="form-control"  name="name"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">البريد الالكترونى </label>
                                                                <span class="required"> * </span>
                                                                <input type="text" value="{{$admin->email}}" class="form-control" name="email"/> </div>
                                                                <div class="form-group">
                                                                <label class="control-label"> كلمة السر الجديدة</label>
                                                                <span class="required"> * </span>
                                                                <input type="password" class="form-control"  name="password"  /> </div>
                                                               

                                                            <div class="margiv-top-10">
                                                                      <button type="submit" class="btn green button-submit">حفظ التغييرات  </button>

                                                             
                                                            </div>


                                                          {!! Form::close() !!}
                                                    </div>
                                                  
                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
               @endsection