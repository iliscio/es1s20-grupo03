<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Inicio - TruckExpress</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- <link href="css/index.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>

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

              <tbody id="pending-content"></tbody>

            </table>      
          </div>


    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" scr="js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min.map"> </script>

    <script type="text/javascript">
      $(document).ready(function(){
        
        $.ajax({
            url : "get-contract_cli.php",
            type : 'GET',
            data: { 'idQuery':2 },
            beforeSend: function(){
              $("#pending-content").html("<p>Carregando inicio</p>")
            },
            success:function(data){pending_contract
              $("#pending-content").html(data);
            },
            error: function(data){
              alert("Erro: "+data);
            }
         });  
      });

    </script>

  </body>
</html>

<!-- Backup's -->

<!--

<li class="nav-item">
  <a class="nav-link" href="#">
    <span data-feather="bar-chart-2"></span>
    Reports
  </a>
</li> 



-->