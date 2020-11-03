@extends(cpanel_layout().'.index')

@section('content')
                        
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                   
                        <h1 class="page-title"> 
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                               
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN TICKET LIST CONTENT -->
                                <div class="app-ticket app-ticket-list">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                              
                                                <div class="portlet-body">
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="btn-group">
                                                                    <button id="sample_editable_1_new" class="btn sbold green" style="background: #67809F!important;"  data-toggle="modal" data-target="#myModal">  مدينة جديدة 
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                            
                                                                <th>  # </th>
                                                                <th> المدينة باللغة العربية </th>
                                                                <th> المدينة باللغة الانجليزية</th>
                                                             
                                                                <th> الحدث </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                            @foreach($Cities as $city)
                                                            <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                   {{$city->name_ar}}
                                                                </td>
                                                                <td>
                                                                    {{$city->name_en}}
                                                                </td>
                                                                <td> 

        <button type="submit" class="btn-delete btn btn-xs btn-danger delete-confirm"  data-toggle="modal"  data-target="#myModaldelete{{$city->id}}" >
            <i class="glyphicon glyphicon-trash"></i>
        </button>

        <button type="submit" class="btn-delete btn btn-xs btn-danger" data-toggle="modal" data-target="#myModaedit{{$city->id}}" >
        <i class="glyphicon glyphicon-edit"></i>
 
        </button>
        <div class="modal fade" id="myModaldelete{{$city->id}}" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3> الحذف </h3>
            </div>
            <div class="modal-body">
               <h4> هل أنت متأكد من  حذف المدينة؟   </h4>
            </div> 
            <form method="post" action="{{url('/admin/deletecity/'.$city->id)}}" >
                                @csrf
            <div class="modal-footer">
                               
                <button type="submit" class="btn btn-danger"  >نعم</button>
      
                
            </div>  
        </form>
        </div>
    </div>
</div>




       <!-- Modal -->
       <div class="modal fade" id="myModaedit{{$city->id}}" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> تعديل  </h4>
        </div>
        <div class="modal-body">

        <form method="post" action="{{url('/admin/edicity/'.$city->id)}}"  >
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">المدينة باللغة العربية </label>
    <input type="text" class="form-control"  name="name_ar" value="{{$city->name_ar}}"> 
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">المدينة باللغة الانجليزية </label>

    <input type="text" class="form-control"  name="name_en"  value="{{$city->name_en}}">
  </div>
 
  <button type="submit" class="btn btn-primary">حفظ</button>
</form>
        </div>
       
      </div>
    </div>
  </div>
</div>
  </td>
                                                               
                                                               
                                                            </tr>
                                                         
                                                      @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
         
         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> مدينة جديدة </h4>
        </div>
        <div class="modal-body">

        <form method="post" action="{{ route('storecity') }}"  >
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">المدينة باللغة العربية </label>
    <input type="text" class="form-control"  name="name_ar">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">المدينة باللغة الانجليزية </label>

    <input type="text" class="form-control"   name="name_en">
  </div>
 
  <button type="submit" class="btn btn-primary">حفظ</button>
</form>
        </div>
       
      </div>
    </div>
  </div>
</div>







   
      @endsection
  