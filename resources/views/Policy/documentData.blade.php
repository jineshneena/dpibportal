       <div class="card open">
            <div class="card-body"> 
                <div class="panel-heading">
                    <ul class="panel-actions list-inline pull-right">
                        <li class="dpib_customer_document_add" policy-id="{{$policyId}}"><span class="panel-action-add"  data-toggle="tooltip" title="Add a document" ><span class="fas fa-plus text-blue"></span></span>
                        </li>  
                    </ul> 
                    <h1 class="panel-title">Documents<small></small></h1> </div>
                    
                    <div class="table-responsive" style='width:100%;'>
                        <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_policy_doc" width='100%'>
                            <thead>
                                <tr>
                                    <th style="width: 25%" class="nowrap">File</th>
                                    <th  class="nowrap" style="width: 10%">Type</th>
                                    <th style="width: 25%" class="nowrap">Comment</th>                           
                                    
                                    <th  class="nowrap" style="width: 10%">Uploaded By</th>
                                    <th  class="nowrap" style="width: 5%">Uploaded at</th>
                                    <th  class="nowrap" >  </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
               
                </div> 

            </div>
              </div>
<script src="{{ asset('js/global/datatable/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global/datatable/datetime.js') }}" type="text/javascript"></script>

<script>
     var columnDefs = [];
     var policyId= {!! $policyId !!};
                var customerdocumentTable = '';
                $(function(){

                columnDefs.push({"name": 'filename', "targets": 0, data: function (row, type, val, meta) {
                var subject = row['file_name'];
                row.sortData = row['file_name'];
                linkString = "<a href='{!! route('getCustomerDownload',['##CID','##PID','##FILE']) !!}'>" + subject + "</a>";
                var link = linkString.replace("##CID", row['customer_id']).replace('##PID',policyId) .replace("##FILE", subject);
                row.displayData = link;
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
            
               
            
                columnDefs.push({"name": 'filetype', "targets": 1, "orderable": false, data: function (row, type, val, meta) {
                var subject = row['docType'];
                row.sortData = row['docType'];
                row.displayData = subject;
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
            
             columnDefs.push({"name": "comment", "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                var subject = row['comment'];
                row.sortData = row['comment'];
                row.displayData = subject;
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
            
                columnDefs.push({"name": 'Uploaded by', "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                var subject = row['uploadedBy'];
                row.sortData = row['uploadedBy'];
                row.displayData = subject;
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
            
                columnDefs.push({"name": 'Uploaded at', "targets": 4, "orderable": false, data: function (row, type, val, meta) {
                var subject = (row['upload_at'] !=null)? moment(row['upload_at']).format('DD.MM.YYYY'):'-';
                row.sortData = (row['upload_at'] !=null)? moment(row['upload_at']).format('DD.MM.YYYY'):'-';
                row.displayData = subject;
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
            
                columnDefs.push({"name": 'actions', "targets": 5, "orderable": false, data: function (row, type, val, meta) {
                var subject = '-';
                
                fileName = row['file_name'];
                              fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
                              var extensionArray = ['jpeg','pdf','jpg','png'];
                              var displayAction = '<a class="dpib_document_edit" docId=' + row['docId'] + ' customerId =' + row['customer_id'] + ' ><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit document info"></span></a>' + '<a class="dpib_document_delete" docId=' + row['docId'] + '><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete document"></span></a>';
                            
                            if(jQuery.inArray(fileExtension.toLowerCase(), extensionArray) !== -1){
                               var link ='<a href="{!!  url("/")  !!}/uploads/'+row['customer_id']+'/document/'+policyId+'/'+ fileName +'" class="dib-cursor-style"  target="_blank" style="margin-left:3px"><span class="fas fa-eye text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Preview file"></span></a>';
                              displayAction += link; 
                            }
                              row.displayData =displayAction; 
                
                return row;
                }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                
                var groupColumn = 1;
                customerdocumentTable = $('.dpib_policy_doc').DataTable({
                data: {!! $documentDetails !!},
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
                        order: [[groupColumn, "desc"]],
                        pageLength: 100,
                        displayLength: 100,
                        autoFill: false,
                        search: false,
                        columnDefs:columnDefs,
                         drawCallback: function ( settings ) {
                                var api = this.api();
                                var rows = api.rows( {page:'current'} ).nodes();
                                var last=null;

                                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                                
                                if ( last !== group.type ) {
                                        $(rows).eq( i ).before(
                                            '<tr class="group" style="background-color:#03a9f3;color:#fff;height:7px;line-height:1px"><td colspan="6" style="text-align:center">'+(group.docType)+'</td></tr>'
                                        );

                                        last = group.type;
                                    }
                                } );
                        },
                        language: {

                        paginate: {
                        "first": '<i class="fa fa-angle-double-left"></i>',
                                "last": '<i class="fa fa-angle-double-right"></i>',
                                "next": '<i class="fa fa-angle-right"></i>',
                                "previous": '<i class="fa fa-angle-left"></i>'
                        }
                        },
                        dom: "Bfrtip"

                });
                
                    $('.dpib_policy_doc tbody').on( 'click', 'tr.group', function () {
        var currentOrder = customerdocumentTable.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            customerdocumentTable.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            customerdocumentTable.order( [ groupColumn, 'asc' ] ).draw();
        }
 
} );
                //Document upload initialization
                $(document).on('click', '.dpib_customer_document_add', function(){
               var that = $(this);
               console.log('entererere')
                    $.ajax({
                url: "{!! route('customerdocaddform',$customerId) !!}",
                        type: "GET"

                }).done(function (data) {
                DIB.alert(data.html, 'Add document', false, false, false, 'customdocadd');
                input = $("<input type=\"hidden\" id=\"current_policy_id\" name=\"policy_id\" />");
                $("#form_document_add").append(input);
                $("#current_policy_id").val(that.attr('policy-id'));
                $("button.primary").off('click');
                $("button.primary").on('click', function (event) {
                event.preventDefault();
                if ($('#document_file')[0].files.length <= 0) {
                DIB.displayErrors("File is mandatory", LOCALE.get('insly.common.whoops'));
                } else if ($('#document_file')[0].files.length > 0) {
                var checkFlag = FORM.validateFile($('#document_file'), 128, 'Maximum file upload size 128 MB exceeded!');
                if (checkFlag) {
               
                $("#form_document_add").submit();
                $(".preloader").show(); 
                }

                } else {

                }

                });
                });
                });
                
                $(document).off('click', '.dpib_document_delete');
                $(document).on('click', '.dpib_document_delete', function(){
  
                var removeId = $(this).attr('docId');
                 $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you realy want to delete this document?</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "primary btn waves-effect waves-light btn-rounded btn-success",
                            text:"Delete",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                 $.ajax({
                url: "{!! route('customerdocdelete',$customerId) !!}",
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data :{'docId':removeId}
                }).done(function (data) {
                if (data.success) {
                location.reload(true);
                }
                });
                              

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });               

            
                  DIB.centerDialog(); 
                
                
                
                
                });
                //Edit document

                $(document).off('click', '.dpib_document_edit');
                $(document).on('click', '.dpib_document_edit', function(){

                var documentId = $(this).attr('docId');
                var customerId = $(this).attr('customerId');
                var linkString = '{!! route("customerdocedit",["##customerId##","##docId##"]) !!}';
                var link = linkString.replace("##customerId##", customerId).replace("##docId##", documentId);
                $.ajax({
                url: link,
                        type: "GET"

                }).done(function (data) {
                if (data.status) {

                $("#dp_edit_selected_doc").remove();
                $('body').append('<div id="dp_edit_selected_doc" title="Edit document"  >' + data.content + '</div>');
                var dialogElement = $("#dp_edit_selected_doc");
                dialogElement.dialog({
                width: 500,
                        resizable: false,
                        bgiframe: true,
                        modal: true,
                        buttons: {

                        "Edit": {
                        class: "primary dp_document_data_edit btn waves-effect waves-light btn-rounded btn-success",
                                text:"Edit",
                                click: function () {
                                $.ajax({
                                url: $('form#form_document_edit').attr('action'),
                                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data :{'documenttype_oid':$('#documenttype_oid').val(), 'document_comment':$('#document_comment').val()}

                                }).done(function(data) {
                                if (data.status) {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                                //loading document datatable once more
                                $('#tab_document').find('a').trigger('click');
                                DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                DIB.closeProgressDialog();
                                }
                                })

                                }
                        },
                                "cancel":   {
                                class: "btn waves-effect waves-light btn-rounded btn-danger",
                                text:"cancel",

                                        click: function () {
                                        dialogElement.dialog('close');
                                        dialogElement.remove();
                                        }
                                }

                        },
                        close: function (event, ui) {

                        }
                });
                }
                });
                })



                });


</script>