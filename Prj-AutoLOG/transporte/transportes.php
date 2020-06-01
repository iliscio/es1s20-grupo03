<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

        <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav  class="col-md-12 order-md-1 navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
      <div class="col-md-10" >
         <span>&nbsp;</span>  
      </div>
      <div class="col-md-1" >
         <button id="btn_salvar" type="button" class="btn campos button_rigth btn-primary">&nbsp;Salvar&nbsp;</button>  
      </div>
      <div class="col-md-1" >
         <button id="btn_sair" type="button" onclick="javascript: window_hide()" class="btn campos button_rigth btn-primary">&nbsp;Sair&nbsp;&nbsp;</button>  
      </div>
    </nav>


    <div class="col-md-12 order-md-1">
      
      <form id="linhas" class="needs-validation" novalidate>
        <div class="row">
        <div  class="col-md-3 mb-3">
           <label style="font-weight: bold;">Tipo</label>
        </div>
        <div  class="col-md-3 mb-3">
           <label style="font-weight: bold;">Placa</label>
        </div>
        <div  class="col-md-3 mb-3">
           <label style="font-weight: bold;">Cor</label>
        </div>
      </div>
        <span id="block" >
          <?php
            require('../php/linhas.php');
          ?>
        </span>
        

      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" scr="js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min.map"> </script>

    <script type="text/javascript">

      var v_total = 1;

      $(document).ready(function(){

        v_total = document.getElementById("block").children.length;

        enumeraLinhas();

        $("#btn_salvar").click(function(){
          //alert("oie");

          var formdata = $("#linhas").serializeArray();
          var data = [];

          $(formdata ).each(function(index, object){
              data[object.name] = object.value;
          });

            console.log(data);

          });

      });

      function insereLinha(){

        //var data = {};
        var obj1 = $("#block").html();

       v_prox = v_total+1;
       
        console.log(v_prox);
        $.ajax({
            url : "php/linhas.php",
            method : 'GET',
            data: { 'Prox':1 },
            beforeSend: function(){
              $("#block").html("<p>Carregando linha</p>")
              
              
            },
            success:function(data){
              $("#block").html(obj1+data);

              enumeraLinhas();
            },
            error: function(data1){
              console.log("Erro: "+data1.responseText);
            }
         });

      }

      function enumeraLinhas(){

        v_total = document.getElementById("block").children.length;

        //alert("total linhas: "+v_total);

        var obj = document.getElementById("block").children;

        for(i=0;i<=v_total-1;i++){
          
          var conteudo = "obj["+i+"].id = "+i;
         //alert("conteudo: "+conteudo);
          eval(conteudo);
        
        }

      }


      
    </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>   

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