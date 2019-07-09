@extends('layouts.app')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('content')
<div id="message"></div>
<h1>services</h1>
  <ul class="list-group">
      <a href="/dsibank/public/clients/create"><li class="list-group-item">Creation de Client</li></a>
      <a href="/dsibank/public/comptes/create"><li class="list-group-item">Creation de Compte</li></a>
      <li class="list-group-item">Versement
        <div id="vdiv">
          <select class="form-control" name="item_id" id="vlist_comptes">
          </select>
          <br>
          <input type="text" id="Vmontant"> <button onclick="verser()" class="btn btn-primary" id="Vbtn"> Verser <button>
          </div>
      </li>

      <li class="list-group-item">Retrait
        <div id="rdiv">
          <select class="form-control" name="item_id" id="rlist_comptes">
          </select>
          <br>
          <input type="text" id="Rmontant"> <button onclick="retrait()" class="btn btn-primary" id="Rbtn"> Retrait <button>
          </div>
      </li>

      <li class="list-group-item">Transfert d'argent
        <div id="trdiv">
          <p>Compte 1</p>
          <select class="form-control" name="item_id" id="1list_comptes">
          </select>
          <p>Compte 2</p>
          <select class="form-control" name="item_id" id="2list_comptes">
          </select>
          <br>
          <input type="text" id="montant"> <button onclick="transfert()" class="btn btn-primary" id="Rbtn"> Transferer <button>
          </div>
      </li>
  </ul>  

  <script>
      $(document).ready(function(){
        fetch_data();
        function fetch_data(){
          $.ajax({
            url:"/dsibank/public/services/fetch_data",
            dataType:"json",
            success:function(data){
              var html ='';
              for (var count=0;count<data.length;count ++){
                html+='<option value="'+data[count].id+'">'+data[count].rib+'</option>'
              }
              $('select').html(html);
            }
          })
        }
      });
 
      function verser(){ 
        var id = $('#vlist_comptes').val();
        var M = $('#Vmontant').val();
        console.log(id);
          $.ajax({
              url : "/dsibank/public/services/servicesvER",
              type : "POST",
              data :{ 
              "_token": "{{ csrf_token() }}",
              id:id,
              mont:M,
              }
              ,         
              success: function(data){
                swal({
                              title: "Effectué",
                              text: "",
                              icon: "success",
                              button: "Great!",
                            });
              },
              error: function(){

                alert("not working")
              }
          });
        }

        

        function retrait(){ 
        var id = $('#rlist_comptes').val();
        var M = $('#Rmontant').val();
        console.log(id);
          $.ajax({
              url : "/dsibank/public/services/servicesretrait",
              type : "POST",
              data :{ 
              "_token": "{{ csrf_token() }}",
              id:id,
              mont:M,
              }
              ,         
              success: function(data){
                swal({
                              title: "Effectué",
                              text: "",
                              icon: "success",
                              button: "Great!",
                            });
              },
              error: function(){

                alert("not working")
              }
          });
        }

        function transfert(){ 
        var id = $('#1list_comptes').val();
        var idn = $('#2list_comptes').val();
        var M = $('#montant').val();
        console.log(id,idn);
          $.ajax({
              url : "/dsibank/public/services/servicestransfert",
              type : "POST",
              data :{ 
              "_token": "{{ csrf_token() }}",
              id:id,
              idn:idn,
              mont:M,
              },         
              success: function(data){
                swal({
                              title: "Effectué",
                              text: "",
                              icon: "success",
                              button: "Great!",
                            });
              },
              error: function(){

                alert("not working")
              }
          });
        }
      
      
  </script>
@endsection