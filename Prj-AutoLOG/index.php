<?php
  require_once("php/contrato.php");
  require_once("funcao.php");
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
//echo $_POST['num'];


    require_once("php/manutencao_cliente.php");

    $insertAccount  = altera('account');
    $insertLocation = altera('location');
    $insertContact  = altera('contact');

    if ($insertLocation && $insertContact && $insertAccount){

      $sucesso1 = 'Registro atualizado com sucesso!';

    }else{

      $erro1 = 'Erro na atualização do registro. Por favor, tente novamente em alguns instantes.';
      
    }

  }

require_once("php/head.php");
require_once("index/dependencias.php");

//the modal
require_once("index/modal.php");

require_once("index/navbar.php");

require_once("index/menu.php");
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php if (isset($sucesso)) echo "<div class=\"alert alert-success\" 
                                              id=\"alert_msg\" role=\"alert\">
                                                  $sucesso
                                             </div>";?>
            <?php if (isset($erro))    echo "<div class=\"alert alert-danger\"
                                                  id=\"alert_msg\" role=\"alert\">
                                                      $erro
                                             </div>";?>
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
            <?php if (isset($sucesso1)) echo "<div class=\"alert alert-success\" 
                                              id=\"alert_msg\" role=\"alert\">
                                                  $sucesso1
                                           </div>";?>
            <?php if (isset($erro1)) echo "<div class=\"alert alert-danger\"
                                                  id=\"alert_msg\" role=\"alert\">
                                                      $erro1
                                                </div>";?>
            <!--<img src="http://maps.googleapis.com/maps/api/staticmap?center=-22.767622, -47.394771&zoom=11&size=250x250">-->
          </div>

        </main>
     
     <?php
     // js e rodape
      require_once("index/rodape.php");
     ?>