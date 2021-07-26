
@extends('layouts.elite_client' )


@section('headtitle')
Dashboard
@endsection




@section('content')
<div class="row">
    <!-- Column -->
    
    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="social-widget">
                                        <div class="soc-header box-facebook">Requests</div>
                                        <div class="soc-content">
                                            <div class="col-6 b-r">
                                                <h3 class="font-medium">{{$countDetails['request']['active']}}</h3>
                                                <h5 class="text-muted">Active</h5></div>
<!--                                               <div class="col text-right align-self-center col-4" >
                                                         <div data-label="40%" class="css-bar m-b-0 css-bar-primary css-bar-65" style='padding:0px;'><i class="mdi mdi-account-circle"></i></div>
                                               </div>-->
                                            <div class="col-6">
                                                <h3 class="font-medium">{{$countDetails['request']['closed']}}</h3>
                                                <h5 class="text-muted">Closed</h5>
                                            </div>
                                              
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="social-widget">
                                        <div class="soc-header box-twitter">Claims</div>
                                        <div class="soc-content">
                                            <div class="col-6 b-r">
                                                <h3 class="font-medium">{{$countDetails['claim']['active']}}</h3>
                                                <h5 class="text-muted">Active</h5></div>
                                            <div class="col-6">
                                                <h3 class="font-medium">{{$countDetails['claim']['closed']}}</h3>
                                                <h5 class="text-muted">Closed</h5></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
    
    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="social-widget">
                                        <div class="soc-header box-linkedin">Complaints</div>
                                        <div class="soc-content">
                                            <div class="col-6 b-r">
                                                <h3 class="font-medium">{{$countDetails['complaint']['active']}}</h3>
                                                <h5 class="text-muted">Active</h5></div>
                                            <div class="col-6">
                                                <h3 class="font-medium">{{$countDetails['complaint']['closed']}}</h3>
                                                <h5 class="text-muted">Closed</h5></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
    
   
    <!-- Column -->
    <!-- Column -->

    <!-- Column -->
</div>






<div class="row">

    <div class="col-lg-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Policies</h4>

                <div class="table-responsive m-t-40">
         <table class="table table-bordered table-striped dpib_policy_list color-table info-table" style='width:100%;'>
                    <thead>
                        <tr>
                            <th  class="nowrap">Policy No</th>
                            <th  class="nowrap">Insurer</th>                      
                            <th  class="nowrap" >Validity</th>
                            <th  class="nowrap" >Customer</th>
                            <th  class="nowrap" >Object</th>
                            <th  class="nowrap" >Status</th>                            
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
        
    
    
   
</div>


@endsection
@section('customcss')
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/assets/node_modules/css-chart/css-chart.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"> 


@endsection

@section('customscript')   
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/global/datatable/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global/datatable/datetime.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dibcustom/dib-quote-request.js') }}" type="text/javascript"></script>

@endsection


@section('pagescript')

<script>
      var columnDefs = [];
    var policyTable = '';


      var roleArray = @json(Auth::user()->roles);
    $(function(){
        
        columnDefs.push({"name": 'policyno',  "targets": 0, data: function (row, type, val, meta) {
                
                            var urlString = '{!! route("clientpolicyoverview",["##RID"]) !!}';
                            var link = urlString.replace("##RID", row['mainId']);
                            
                             var subject =   (row['policy_number'] !==null) ? "<a href='"+link+"'>"+ row['policy_number']+"</a>": "<a href='"+link+"'>"+"---not issued---"+"</a>";

                          
                            
                            row.sortData = row['policy_number'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "insurer",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['insurer_name'];
                            row.sortData = row['insurer_name'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'validity',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['startDate']+ " - " +row['endDate'] ;
                            row.sortData = row['start_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
        columnDefs.push({"name": 'customer',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject =  row['customerName'];
                            row.sortData = row['customerName'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});              
                    
        columnDefs.push({"name": 'object',  "targets": 4, data: function (row, type, val, meta) {
                       var subject = row['product_name'];
                           
                            
                            var objectJson = JSON.parse(row['objectdetails']);
                            var objectString =(row['product_name']!=null) ? row['product_name']+'<br>':'-';
                            if(_.size(objectJson) >0) {
                                $.each(objectJson,function(key,value){
                                  objectString+= createObjectColumnValue(value,value.object_type);                                
                                   
                               })
                            }
                           // newString = (objectString !='') ? objectString.slice(0, -1) :'' ;
                            row.sortData = (objectString !='') ? objectString.slice(0, -1) :'' ;
                            row.displayData = (objectString !='') ? objectString.slice(0, -1) :'' ;                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});                
                    
        columnDefs.push({"name": 'status',  "targets": 5, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['statusString'];
                            row.sortData =row['policy_status'];;
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
                  
                    
        
       
      policyTable =   $('.dpib_policy_list').DataTable( {
                data: {!! $allpolicies !!},
                autoWidth: true,
                stateSave: false,
                stateDuration: 60 * 60 * 24,
                responsive: true,
                deferRender: true,
                lengthChange: true,
                pagination: true,
                rowLength: true,
                scrollX: true,
                pagingType: 'full_numbers',
                processing: true,
                serverSide: false,
                destroy: true,
                order: [[2, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:columnDefs,
                language: {

                                paginate: {
                                    "first": '<i class="fa fa-angle-double-left"></i>',
                                    "last": '<i class="fa fa-angle-double-right"></i>',
                                    "next": '<i class="fa fa-angle-right"></i>',
                                    "previous": '<i class="fa fa-angle-left"></i>'
                                }
                            },
                dom: "Blftip"
     
    } ); 
    

    
    
    
       
   });
   function createObjectColumnValue(objectJson,objectType) {
        var objectString =''; 
        var personArray =['address','gender','last_name','dob'];
        var vehicleArray =['make','model','year','license_plate'];
        var propertyArray = ['property_type','year_built','area','construction_material'];

        $.each(objectJson,function(key,value){
              
                                 if(objectType =='person' && $.inArray( key, personArray )> -1) {
                                   objectString +=(value !==null) ? value+"," : '';
                                 } else if(objectType =='vehicle' && $.inArray( key, vehicleArray )> -1){
                                    objectString +=(value !==null) ? value+",": ''; 
                                 } else if(objectType =='property' && $.inArray( key, propertyArray )> -1){
                                    objectString +=(value !==null) ? value+",": '';
                                 }
                                 
                                   
                               });
                               
                               return objectString;
   
   }
</script>
@endsection

