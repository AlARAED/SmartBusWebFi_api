@extends(cpanel_layout().'.index')
@section('content')
                        
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
      
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                
                                    <div class="portlet-body form">

                                        <form class="form-horizontal" action="{{ url('admin/Changeinfo') }}" id="submit_form" method="POST">
                                        @csrf   
                                        <div class="form-wizard">
                                                <div class="form-body">
                                                    <ul class="nav nav-pills nav-justified steps">
                                                        <li>
                                                            <a href="#tab1" data-toggle="tab" class="step">
                                                                <span class="number"> 1 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i>  عن التطبيق باللغة العربية </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab2" data-toggle="tab" class="step">
                                                                <span class="number"> 2 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> عن التطبيق بالغة الانجليزية </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                                <span class="number"> 3 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> معلومات الاتصال </span>
                                                            </a>
                                                        </li>
                                                       
                                                    </ul>
                                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                                        <div class="progress-bar progress-bar-success"> </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="alert alert-danger display-none">
                                                            <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                        <div class="alert alert-success display-none">
                                                            <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                        <div class="tab-pane active" id="tab1">
                                                           
                                                          
                                                            <div class="form-group">
                                                               
                                                                <div class="col-md-12">
                                                                <textarea id="TextArea1" class="form-control" rows="50" name="about_ar">
                                                                    {{$app->about_ar}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="form-group">
                                                                
                                                                <div class="col-md-12">
                                                                <textarea id="TextArea1" class="form-control" rows="50" name="about_en">  {{$app->about_en}}</textarea>

                                                                </div>
                                                            </div>

                                                           
                                                        </div>
                                                        <div class="tab-pane" id="tab3">

                                                        <div class="form-group">
                                                                <label class="control-label col-md-3">البريد الالكترونى
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="email"  class="form-control"  name="emailapp"   value="{{$app->emailapp}}"/>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">رقم الجوال
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="phone_no"   value="{{$app->phone_no}}"/>
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">واتساب
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="watsapp"   value="{{$app->watsapp}}" />
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">تويتر
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" placeholder="" class="form-control" name="twitter"   value="{{$app->twitter}}"/>
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">حساب الفيسبوك
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text"  class="form-control"  name="fb"   value="{{$app->fb}}"/>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">انستغرام
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text"  class="form-control"  name="insta"   value="{{$app->insta}}"/>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">سناب
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text"  class="form-control"  name="snap"   value="{{$app->snap}}"/>
                                                                </div>
                                                            </div>


                                                            <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                          <button type="submit"  class="btn green button-submit">  <i class="fa fa-check"></i>حفظ</button>
                                                          
                                                        </div>
                                                    </div>
                                                </div>

                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>

            
                                                
                                          
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
            
           
            </div>
           
      
           
@endsection