<!-- extends('layouts.app')-->
<head>
@include ('inc.navbar')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Scripts -->
<!--script src="{{ asset('js/app.js') }}"></script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Styles -->
<!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->



{{-- dataTables --}}
<!--link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"-->

{{-- SweetAlert2 --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--link href="{{ asset('public/assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"--> 


{{-- dataTables --}}
<!--script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script-->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<!--script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script-->


{{-- Validator --}}
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
</head>

<body>
<main class="py-4">
<div class="container">
<h1>Liste des comptes</h1>
<a onclick="addForm()" class="btn btn-sm btn-success pull-right">Add New</a>
<table id='compte_table' class="table table-dark">
    <thead>
      <tr>
        <th>id</th>
        <th>Code Banque</th>
        <th>Code Guichet</th>
        <th>RIB</th>
        <th>Cle Rib</th>
        <th>Titulaire</th>
        <th>Solde</th>
        <th>Devise</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
</table>
@include('compte.form')
</div>
</main>
</body>
<script type="text/javascript">


    var table1= $('#compte_table').DataTable({
        processing:true,
        ServerSide:true,
        ajax: "{{ route('all.compte') }}",
        columns: [
                {data: 'id', name:'id'},
                {data: 'codeBanq', name:'codeBanq'},
                {data: 'codeGuichet', name:'codeGuichet'},
                {data: 'rib', name:'rib'},
                {data: 'clerib', name:'clerib'},
                {data: 'titulaire', name:'titulaire'},
                {data: 'solde', name:'solde'},
                {data: 'devise', name:'devise'},
                {data: 'action', name:'action', orderable:false , searchable:false}
               
        ]
    });

    //-------------
    function showData(id) {
          $.ajax({
              url: "{{ url('compte') }}" + '/' + id,
              type: "GET",
              dataType: "JSON",
            success: function(data) {
              $('#single-data').modal('show');
              $('.modal-title').text('Informations');
              $('#cid').text(data.id); 
              $('#comptecodebanq').text(data.codeBanq);
              $('#comptecodeguichet').text(data.codeGuichet);
              $('#compterib').text(data.rib);
              $('#compteclerib').text(data.clerib);
              $('#comptetitulaire').text(data.titulaire);
              $('#comptesolde').text(data.solde);
              $('#comptedevise').text(data.devise);
            },
            error : function() {
                alert("error");
            }
          });
        }

    // ----------
    function addForm(){
      
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Compte');
        
    }

    //----------inserting
    $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
              
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('compte') }}";
                    else url = "/dsibank/public/compte/comptemd/"+id; 
                    $.ajax({
                        url : url,
                        type : "POST",
                        //data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),//"_token": "{{ csrf_token() }}"
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table1.ajax.reload();
                            swal({
                              title: "Effectué",
                              text: "",
                              icon: "success",
                              button: "Great!",
                            });
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                icon: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });

        //----------

        function editForm(id){
          save_method="edit";
          $('input[name=_method]').val('PATCH');
          $('#modal-form form')[0].reset(); 
          $.ajax({
              url : "{{ url('compte')}}"+'/'+id+"/edit",
              type : "GET",
              dataType:"JSON",
              success: function(data){
                $('#modal-form').modal("show");
                $('.modal-title').text('Edit Compte');
                $('#id').val(data.id);
                $('#codebanq').val(data.codeBanq);
                $('#codeguichet').val(data.codeGuichet);
                $('#rib').val(data.rib);
                $('#clerib').val(data.clerib);
                $('#solde').val(data.solde);
                $('#titulaire').val(data.titulaire);
                $('#devise').val(data.devise);

              },
              error: function(){

                alert("not working")
              }
          });
        }

        //---------------------
        function deleteData(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                  url : "{{ url('compte') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table1.ajax.reload();
                      swal({
                        title: "Delete Done!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Done",
                      });
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
        }

</script>
