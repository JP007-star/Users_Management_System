<!DOCTYPE html>
<html>
<head>
    <title>Users Record</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="css/dropify.css"> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="js/dropify.js"></script> -->
<style>
.err{
position:absolute;
width:100%;
left:200px;
top:37px;
color:red;
font-size: 10px;
}
</style>

</head>

   
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse nav-dark navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav  mr-auto">
      <li class="nav-item">
        <a class="nav-link p-3 nav-dark" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item nav-dark">
        <a class="nav-link p-3" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </li>
     
      <li class="nav-item">
                <a class="nav-link p-3" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item">
                <a class="nav-link p-3" href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search "></i></button>
    </form>
  </div>
</nav>
    
<div class="container">
    <h2 class="mt-5">Users Record</h2>
    <a class="btn btn-success float-lg-right "  style="margin-bottom :20px;color:white;"   id="createNewUser"> Add New</a>
    <table class="table-bordered table-striped" style="width:100%;" id="user_table">
        <thead>
            <tr>
                <th>Avator</th>
                <th>Name</th>
                <th>Email</th>
                <th>Experience</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
        </tbody>
    </table>
</div>
<!-- The Modal -->
<div class="modal" id="addusersModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#f2f2f2;">
        <h4 class="modal-title ModalTittle" style="margin-left:150px;">Add New Records</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form name="userForm" id="userForm" class="form-horizontal">
       
        <div class="row" >
            <input  type="hidden"  name="dpimg" id="dpimg"> 
            <input  type="hidden"  name="userid" id="userid" value=""> 
            <div class="form-group col-12" style="display:inherit;" >
               <label class="form-label col-4">Email<span class="info"></span></label>
               <input  type="email" class="col-8 form-control " name="email" id="email">
              
            </div>
            <div class="form-group col-12" style="display:inherit;" >
               <label class="form-label col-4">FullName <span class="info"></span></label>
               <input  type="text" class="col-8 form-control " name="fullname" id="fullname"> 
            </div>
            <div class="form-group col-12" style="display:inherit;" >
               <label class="form-label col-4">Date of Joining <span class="info"></span></label>
               <input  type="date" class="col-8 form-control " name="dateofjoining" id="dateofjoining"> 
            </div>
            <div class="form-group col-12" style="display:inherit;" >
               <label class="form-label col-4">Date of leaving <span class="info"></span></label>
               <input  type="date" class="col-4 form-control " name="dateofleaving" id="dateofleaving"> 
               
               <div class="col-4 checkbox">
                  <label><input type="checkbox" id="stillworking" name="stillworking" value="1"> Still Working </label>
               </div>
               
            </div>
            <div class="form-group col-12" style="display:inherit;" >
              <label class="col-4 form-label " for="uploadimg">Upload Image</label>
              <input type="file" id="uploadimg" name="uploadimg" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
          
        </div>
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-between"  >
       
        <button type="button" class="btn btn-danger pull-left" style="position:relative;margin-left:200px;" id="saveBtn">Save</button>
      </div>

    </div>
  </div>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue pt-0">

 
  <div class="footer-copyright text-center py-0">© 2021 Copyright:
    <a href="https://mdbootstrap.com/"> Jaya Prasad</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    
</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
<script type="text/javascript">
  
  $('#createNewUser').click(function (e) { 
    e.preventDefault();
    $('.form-label').css('color','');
      $('.form-control').css('border-color','');
      $('.info').html('');
    $('.ModalTittle').html("Add New User");
    $('#stillworking').prop('checked',true);
     $('#userid').val('');
    $('#email').val('');
    $('#fullname').val('');
    $('#dateofjoining').val('');
    $('#dateofleaving').val('');
    $('#addusersModal').modal('show');
  });
  $(document).ready(function(){
      $.ajaxSetup({
        headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
         });
		$('#user_table').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ url('user-datatable') }}",
     columns: [
      { data: 'avatar', name: 'avatar' },
      { data: 'fullname', name: 'fullname' },
      { data: 'email', name: 'email' },
      { data: 'experiance', name: 'experiance' },
      {data: 'action', name: 'action', orderable: false},
      ],
       dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
      order: [[0, 'asc']]
      });
      });
$("#uploadimg").change(function() { 
  var input=this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#uploadimg').attr('src', e.target.result);
       var img = e.target.result;
       $("#dpimg").val(img);
       $("#dpimg").trigger(); 
    }
    reader.readAsDataURL(input.files[0]);  // convert to base64 string
  }
});

 $(document).on('click', '#saveBtn', function(){
      $('.form-label').css('color','');
      $('.form-control').css('border-color','');
      $('.info').html('');
      $.ajax({
          data: $('#userForm').serialize(),
          url:  '{{ url('store-user') }}',
          type: "post",
          dataType: 'json',
          success: function (data) {
          if(data.success){
            var oTable = $('#user_table').dataTable();
            oTable.fnDraw(false);
            $("#save-Btn").html('Submit');
            $("#save-Btn"). attr("disabled", false);
            $('#userid').val();
             $('#addusersModal').modal('hide');
          }
          else{
           
            $('#saveBtn').html('Save Changes');
              
              Object.keys(data.error).forEach(function(value) {
              
              $('#' + value).closest('.form-group').find('label').css('color','red');
              $('#' + value).closest('.form-group').find('input').css('border-color','red');
              //$('#' + value).closest('.form-group').find('.info').html('<small class="err">'+data.error[value]+'</small>');
              
            

            });
          }
          },
          
      });
    
       
    });

$(document).on('click', '.deleteuser', function(){
    var id = $(this).attr("id");
    var row = $(this);
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
  })
swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to delete the User!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed){
      $.ajax({
          url: '{{ url('Delete-User') }}',
          data: { "id": id },
          type: "POST",
          dataType: 'json',
          success: function (data) {
           
           $(row).closest('tr').remove();
            
          } 
      });
      swalWithBootstrapButtons.fire('Deleted!','User has been deleted.','success');
       }
       else {
          swalWithBootstrapButtons.fire('Cancelled','User deletion not affected','error' );
        }
      });
        
    });
$(document).on('click', '.edituser', function(){
       $('.form-label').css('color','');
      $('.form-control').css('border-color','');
      $('.info').html('');
      var id = $(this).attr("id");
      var row = $(this);
     
      $.ajax({
         type:"POST",
         url: "{{ url('edit-user') }}",
         data: { 'id': id },
         dataType: 'json',
         success: function(res){
            $('.ModalTittle').html("Edit User");
            $('#addusersModal').modal('show');
            $('#userid').val(id);
            $('#email').val(res.email);
            $('#fullname').val(res.fullname);
            $('#dateofjoining').val(res.dateofjoining);
            $('#dateofleaving').val(res.dateofleaving);
            if(res.stillworking == 1){
              $('#stillworking').prop('checked',true);
            }
            $('#dpimg').val(res.uploadimage);
          }
       });
      
    });

    
</script>
</html>