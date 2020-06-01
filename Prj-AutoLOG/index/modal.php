<div id="myModal" class="modal">

      <!-- Modal content -->
      <div id="modalContent" class="modal-content">

        <div class="col-md-12 order-md-1">
        <!--  <h4 class="mb-3">Billing address</h4>-->
          <form enctype="multipart/form-data" class="needs-validation" method="POST" action="index.php">

            <div class="row">
              <div class="col-md-3 mt-3">
                <label for="contractor">Contratante</label>
                <input type="text" value="<?php if($tp_account == 1){echo $_SESSION['account_id'];} ?>" <?php if($tp_account == 1){echo 'disabled';} ?> name="contractor" placeholder="Digite o CNPJ/CPF" class="form-control" id="contractor" required>
              </div>

              <div class="col-md-3 mt-3">
                <label for="engaged">Contrado</label>
                <input type="text" value="<?php if($tp_account == 2){echo $_SESSION['account_id'];} ?>" <?php if($tp_account == 2){echo 'disabled';} ?> name="engaged" placeholder="Digite o CNPJ" class="form-control" id="engaged" required>
              </div>  

              <div class="col-md-3 mt-3">
                <label for="status">Status</label>
                <select name="status" class="custom-select d-block w-100" required>
                  <option value="">Selecione...</option>
                  <option value="OPEN">Aberto</option>
                  <option value="WORKING" selected>Em Andamento</option>
                  <option value="CLOSED">Fechado</option>
                </select>
              </div>

              <div class="col-md-3 mt-3">
                  <label for="delivery_date">Data de entrega</label>
                  <input class="form-control" id="delivery_date" name="delivery_date" placeholder="dd/mm/aaaa" type="text">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 mt-3">
                <label for="file">Arquivo</label>
                <input type="file" name="file" id="file" required>
              </div>
            </div>

            <div class="col-md-12 order-md-1 navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
              <div class="col-md-10">
                 <span>&nbsp;</span>  
              </div>
              <div class="col-md-1">
                 <input id="btn_salvar" type="submit" class="btn campos button_rigth btn-primary" value="Salvar"/> 
                 <input type="hidden" name="save"/>  
              </div>
              <div class="col-md-1">
                 <button id="btn_sair" type="button" onclick="javascript: window_hide()" class="btn campos button_rigth btn-primary">&nbsp;Sair&nbsp;&nbsp;</button>  
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>