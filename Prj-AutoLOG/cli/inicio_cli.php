<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Inicio</title>

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>

  <body>

    <div class="alert alert-success" style="display: none;" id="alert_msg" role="alert">
        Email enviado com sucesso!!
    </div>

    <div class="alert alert-primary" style="display: none;" id="loading" role="alert">
      Enviando..
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">

        <?php
          include_once("../php/get_fornec.php");
        ?>
        
      </div>
    </div>

    <script type="text/javascript">

      $(document).ready(function(){

        $(".enviaEmail").click(function(){

          var v1 = $(this).attr('id');

          $.ajax({
            url : "../php/recebe.php",
            data: {'to':v1},
            type : 'POST',
            beforeSend: function(){
              //alert("oie");
              $("#loading").show();
            },
            success:function(data){
              //alert("enviado");
              $("#loading").hide();
              $("#alert_msg").show();
            },
            error: function(erro, er){
              alert("Erro: "+erro.statusText);
            }
          });

        }); //fecha click

      }); //fecha ready

      
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
