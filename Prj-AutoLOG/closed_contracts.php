<?php

require_once("php/head.php");
require_once("contract/dependencias.php");

?>

          <div class="col-md-10 order-md-1">
            <h2>Últimos contratos</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Documento</th>
                    <th>Data da Entrega</th>
                    <th>Data do Contrato</th>
                  </tr>
                </thead>

                <tbody id="closed-content"></tbody>

              </table>      
            </div>
          </div> <!--Adicionado 31/05/2020-->

<?php require_once("contract/rodape.php");?>