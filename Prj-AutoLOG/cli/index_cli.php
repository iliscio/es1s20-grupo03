<?php
  require_once("../php/contrato.php");
  require_once("../funcao.php");
  @session_start();

  if(isset($_POST['save'])){

    $insertContract = insereContrato();

    if ($insertContract){

      $sucesso = 'Upload com sucesso!';

    }else{

      $erro = 'Erro no upload! Por favor, tente novamente em alguns instantes.';

    }

  }

 if(isset($_SESSION['tp_account'])){
  $tp_account = $_SESSION['tp_account'];
 }else{
  $erro = 'Usuário não logado.';
 }

 // ****************************

 if(isset($_POST['gravar'])&& $_POST['gravar']=='save'){

    require_once("../php/manutencao_cliente.php");

    $insertAccount  = altera('account');
    $insertLocation = altera('location');
    $insertContact  = altera('contact');

    if ($insertLocation && $insertContact && $insertAccount){

      $sucesso1 = 'Registro atualizado com sucesso!';

    }else{

      $erro1 = 'Erro na atualização do registro. Por favor, tente novamente em alguns instantes.';
      
    }

  }

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <script src="../js/jquery-1.8.2.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script>
      //$.noConflict();
      $( document ).ready(function($){
        $("#delivery_date").click(function(){
            //console.log("cliquei");
            $( "#delivery_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
      });
    </script>

    <title>TruckExpress</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <!-- The Modal -->
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

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TruckExpress</a>
      <input class="form-control form-control-dark w-100" type="search" placeholder="Pesquisar" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../sair.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item cursor-index-pointer">
                <a class="nav-link active" id="home">
                  <span data-feather="home"></span>
                  Inicio <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item cursor-index-pointer">
                <a class="nav-link" id="profile" >
                  <span data-feather="users"></span>
                  Perfil
                </a>
              </li>           

              <li class="nav-item cursor-index-pointer">
                <a class="nav-link" id="history">
                  <span data-feather="file"></span>
                  Histórico
                </a>
              </li>

              <li class="nav-item cursor-index-pointer">
                <a class="nav-link" id="pending_contract" >
                  <span data-feather="shopping-cart"></span>
                  Contratos pendentes
                </a>
              </li>

              <li class="nav-item cursor-index-pointer">
                <a class="nav-link" id="contract">
                  <span data-feather="layers"></span>
                  Contratos
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Controles</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" id="upload" style="cursor: pointer;">
                  <span data-feather="upload"></span>
                  Carregar contrato
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../download/Modelo_contrato.docx">
                  <span data-feather="download"></span>
                  Baixar contrato
                </a>
              </li>
              
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 id="tituloh1" class="h2">Página inicial</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Essa semana
              </button>
            </div>
          </div>

          <form name="controle">
            <input type="hidden" name="v_action">
          </form>

          <div id="corpo">

          </div>



        </main>
      </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" scr="../js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="../js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="../js/jquery-3.4.1.min.map"> </script>

    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>feather.replace()</script>

    <script type="text/javascript">
        // Get the modal
        var modal = document.getElementById("myModal");

        // When the user clicks the button, open the modal 
        $("#upload").click(function(){
          modal.style.display = "block";
          $("#contractor").focus();
        });

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

        function window_hide(){
          modal.style.display = "none";
        }
    </script>

    <!--Link's da navbar-->
    <script type="text/javascript">
      $(document).ready(function(){

       // alert("aqui");

        $.ajax({
          url : "inicio_cli.php",
          type : 'GET',
          assync: true,
          beforeSend: function(){
            $("#corpo").html("<p>Carregando inicio</p>")
          },
          success:function(data){
            $("#corpo").html(data);
          },
          error: function(data){
            alert("Erro: "+data);
          }
       });  

        $("#profile").click(function(){
          $(".nav-link").removeClass('active');
          $(this).addClass('active');
          $("#tituloh1").text("Perfil");
        });

        $("#home").click(function(){
          $(".nav-link").removeClass('active');
          $(this).addClass('active');
          $("#tituloh1").text("Página inicial");
        });

        $("#history").click(function(){
          $(".nav-link").removeClass('active');
          $(this).addClass('active');
          $("#tituloh1").text("Histórico");
        });

        $("#pending_contract").click(function(){
          $(".nav-link").removeClass('active');
          $(this).addClass('active');
          $("#tituloh1").text("Constratos pendentes");
        });

        $("#contract").click(function(){
          $(".nav-link").removeClass('active');
          $(this).addClass('active');
          $("#tituloh1").text("Contratos fechados");
        });

      });
    </script>

<!--    Carrega body      -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->

    <script type="text/javascript">
      $(document).ready(function(){

        $('#profile').click(function(){
          $.ajax({
              url : "profile_cli.php",
              type : 'GET',
              assync: true,
              beforeSend: function(){
                $("#corpo").html("<p>Carregando perfil</p>")
              },
              success:function(data){
                $("#corpo").html(data);
              },
              error: function(data){
                alert("Erro: "+data);
              }
         });  
        }); /// Fim do Profile click

          $('#pending_contract').click(function(){
            $.ajax({
                url : "pending_contract_cli.php",
                type : 'GET',
                assync: true,
                beforeSend: function(){
                  $("#corpo").html("<p>Carregando perfil</p>")
                },
                success:function(data){
                  $("#corpo").html(data);
                },
                error: function(data){
                  alert("Erro: "+data);
                }
           });  
          }); /// Fim do pending_contract click

          $('#contract').click(function(){
            $.ajax({
                url : "closed_contracts_cli.php",
                type : 'GET',
                assync: true,
                beforeSend: function(){
                  $("#corpo").html("<p>Carregando perfil</p>")
                },
                success:function(data){
                  $("#corpo").html(data);
                },
                error: function(data){
                  alert("Erro: "+data);
                }
           });  
          }); /// Fim do pending_contract click



        $('#home').click(function(){
          $.ajax({
              url : "inicio_cli.php",
              type : 'GET',
              assync: true,
              beforeSend: function(){
                $("#corpo").html("<p>Carregando inicio</p>")
              },
              success:function(data){
                $("#corpo").html(data);
              },
              error: function(data){
                alert("Erro: "+data);
              }
         });  
        }); /// Fim do inicio click

        $('#history').click(function(){
          $.ajax({
              url : "history_cli.php",
              type : 'GET',
              success:function(result){
                $("#corpo").html(result);
              },
              error: function(result){
                alert("Erro: "+result);
              }
          });
        });/// Fim do History click


      }); //Fim do document ready
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