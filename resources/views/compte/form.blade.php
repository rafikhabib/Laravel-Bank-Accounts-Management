
      
      <!-- Modal -->
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" data-toogle="validator">
                    @csrf {{ method_field('POST') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label for="codebanq">Code Banque</label>
                      <input class="form-control" id="codebanq" name="codebanq" placeholder="Enter Code Banque">
                    </div>
                    <div class="form-group">
                        <label for="codeguichet">Code Guichet</label>
                        <input class="form-control" id="codeguichet"  name="codeguichet" placeholder="Enter Code Guichet">
                    </div>
                    <div class="form-group">
                        <label for="rib">RIB</label>
                        <input class="form-control" id="rib"  name="rib" placeholder="Enter RIB">
                    </div>
                    <div class="form-group">
                        <label for="clerib">Cle RIB</label>
                        <input class="form-control" id="clerib"  name="clerib" placeholder="Enter Cle RIB">
                    </div>
                    <div class="form-group">
                        <label for="titulaire">Titulaire</label>
                        <input class="form-control" id="titulaire"  name="titulaire" placeholder="Enter Titulaire">
                    </div>
                    <div class="form-group">
                        <label for="solde">Solde</label>
                        <input class="form-control" id="solde"  name="solde" placeholder="Enter Solde">
                    </div>
                    <div class="form-group">
                        <label for="devise">Devise</label>
                        <input class="form-control" id="devise"  name="devise" placeholder="Enter Devise">
                    </div>
                    
                  

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" id="#insertbutton" class="btn btn-primary">Go</button>
            </div>
          </form>
          </div>
        </div>
      </div>


      <!--SIngle data show are here-->
<div class="modal fade" id="single-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        </div>
        <div class="modal-body">
        <ul class="list-group">
        <li class="list-group-item">ID: <span class="text-danger" id="cid"></span> </li>
        <li class="list-group-item">Code Banque : <span class="text-danger" id="comptecodebanq"></span> </li>
        <li class="list-group-item">Code Guichet : <span class="text-danger" id="comptecodeguichet"></span> </li>
        <li class="list-group-item">RIB: <span class="text-danger" id="compterib"></span></li>
        <li class="list-group-item">Cle RIB : <span class="text-danger" id="compteclerib"></span></li>
        <li class="list-group-item">Titulaire : <span class="text-danger" id="comptetitulaire"></span></li>
        <li class="list-group-item">Solde : <span class="text-danger" id="comptesolde"></span></li>
        <li class="list-group-item">Devise: <span class="text-danger" id="comptedevise"></span></li>
      </ul>
      </div>
    </div>
  </div>



