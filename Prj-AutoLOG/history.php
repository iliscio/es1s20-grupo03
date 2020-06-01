<?php
  require_once("php/head.php");
  require_once("history/dependencias.php");

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
                    <th>Status</th>
                    <th>Data da Entrega</th>
                    <th>Data do Contrato</th>
                  </tr>
                </thead>

                <tbody id="history-content"></tbody>

              </table>      
            </div>
          </div> <!-- adicionado 31/05/2020 -->


  <?php
    require_once("history/rodape.php");
  ?>