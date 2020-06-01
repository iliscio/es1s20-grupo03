<?php
    

    if(isset($_GET['Prox'])){
      $ProxNum = $_GET['Prox'];
    }else{
      $ProxNum = "";
    }

    echo  '<div class="row">

            <div  class="col-md-3 mb-3">
              <input type="text" class="form-control campos" name="type'.$ProxNum.'" placeholder="Escolha o tipo do veículo" value="" required>
            </div>

            <div class="col-md-3 mb-3">
              <input type="text" class="form-control campos" name="placa'.$ProxNum.'" placeholder="Digite a placa" value="" required>
            </div>

            <div class="col-md-2 mb-3">
                <input type="text" class="form-control campos" name="cor'.$ProxNum.'" placeholder="Escolha a cor" required>
            </div>


            <div class="col-md-1 ">
              <button id="btn_deleta'.$ProxNum.'" type="button" class="btn campos btn-primary">Deletar</button>  
            </div>

            <div class="col-md-1 ">
              <button id="btn_insere'.$ProxNum.'" type="button" onclick="insereLinha()" class="btn campos btn-primary">novo</button>  
            </div>
            
          </div>';


  ?>