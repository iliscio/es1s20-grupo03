<?php
  require_once("cliente.php");

  if(isset($_POST['gravar'])&& $_POST['gravar']=='cadastrar'){

    $select_account = "select (max(eaa.account_id)+1) account_id
                   from exp_account_all eaa";

    $account_id = select('account_id',$select_account);

    $insertLocation = insere('location',$account_id);
    $insertContact = insere('contact',$account_id);
    $insertProfiles = insere('profiles',$account_id);
    $insertAccount = insere('account',$account_id);

    if ($insertLocation || $insertContact || $insertProfiles ||$insertAccount){

      $sucesso = 'Cadastro efetuado com sucesso!';

    }else{
      $erro = 'Erro no cadastro! Por favor, tente novamente em alguns instantes.';
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

    <title>Cadastro - TruckExpress</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>

          <!-- The Modal -->
          <div id="myModal" class="modal">
            <!-- Modal content -->
            <div id="modalContent" class="modal-content">

            </div>

          </div>

          <nav style="height: 50px;" class="col-md-12 order-md-1 navbar navbar-dark bg-dark flex-md-nowrap p-1 shadow">
            <div class="col-md-12" >
               <a href="login.php" style="font-size: 15px; height:50px;text-decoration:none;color:white;margin-top:10px;width:10%;float:left;"><p align="center" style="position:relative;top:12px;">Retornar ao login</p></a>
               <p align="center" style="margin-top:10px;width:85%;float:left; color:white;font-size: 30px;">Truck Express</p>  
            </div>
          </nav>
          
          <div id="container" class="col-md-8 order-md-1">
            <?php if (isset($sucesso)) echo "<div class=\"alert alert-success\" 
                                              id=\"alert_msg\" role=\"alert\">
                                                  $sucesso
                                           </div>";?>
            <?php if (isset($erro)) echo "<div class=\"alert alert-danger\"
                                                  id=\"alert_msg\" role=\"alert\">
                                                      $erro
                                                </div>";?>

            
        <!--  <h4 class="mb-3">Billing address</h4>-->
          <form class="needs-validation" action="cadastro.php" method="POST">

            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="firstName">Nome</label>
                <input type="text" name="name" class="form-control" id="firstName" placeholder="Digite seu nome" value="" required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="account_type">Tipo da conta</label>
                <select name="account_type" id="account_type" class="custom-select d-block w-100" required>
                  <option value="">Selecione...</option>
                  <option value="1">Transportadora</option>
                  <option value="2">Caminhoneiro</option>
                </select>
              </div>

            </div>

             <div class="row" >            

              <div class="col-md-6 mt-3">
                <label for="document_type">Tipo de registro</label>
                <select name="document_type" id="TP_DOC" class="campos custom-select d-block w-100" required>
                  <option value="">Selecione...</option>
                  <option id="PF" value="1">Pessoa Física</option>
                  <option id="PJ" value="2">Pessoa Jurídica</option>
                </select>
              </div>

              <div class="col-md-6 mt-3" >
                <label id="lblDoc" for="cnpj">Documento</label>
                <div class="input-group">
                  <input type="text" value="" name="documento" class="campos form-control" id="doc" placeholder="99.999.999/0000-00" required>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3 mt-3">
                <label for="COUNTRY_CODE">Código do País</label>
                <input type="text" name="country_code" class="form-control" id="COUNTRY_CODE" placeholder="Exemplo: 55">
              </div>

              <div class="col-md-3 mt-3">
                <label for="AREA_CODE">DDD</label>
                <input type="text" name="area_code" class="form-control" id="AREA_CODE" placeholder="Digite seu DDD">
              </div>

              <div class="col-md-6 mt-3">
                <label for="PHONE">Número</label>
                <input type="text" name="phone" class="form-control" id="PHONE" placeholder="Digite seu número">
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="email">Email</label>
                <input type="email" name="email_address" class="form-control" id="email" placeholder="seu@email.com">
              </div>
              <div class="col-md-6 mt-3">
                <label for="senha">Senha</label>
                <input type="password" name="password" class="form-control" id="email" placeholder="Digite sua senha">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 mt-3">
                <label for="zip">CEP</label>
                <input type="text" name="postal_code" maxlength="8"  class="form-control" id="zip" placeholder="12345678" required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="rua">Rua</label>
                <input type="text" name="street" class="form-control"  id="rua" placeholder="Ex.: Honduras" value="" required>
              </div>

              <div class="col-md-3 mt-3">
                <label for="numero">Número</label>
                <input type="text" name="number" class="form-control" id="numero" placeholder="Ex.: 123" value="" required>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mt-3">
                <label for="numero">Cidade</label>
                <input type="text" name="city" class="form-control" id="cidade" placeholder="Ex.: 123" value="" required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="bairro">Bairro</label>
                <input type="text" name="address" class="form-control" id="bairro" placeholder="Ex.: Vila flora" value="" required>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="complemento">Complemento</label>
                <input name="address2" type="text" class="form-control" id="complemento" placeholder="Ex.: Casa, Fundos, etc." value="" >
              </div>

              <div class="col-md-3 mt-3">
                <label for="country">País</label>
                <select name="country" class="campos custom-select d-block w-100" id="country" required>
                  <option value="">Selecione...</option>
                  <option value="US">United States</option>
                  <option value="BR">Brasil</option>
                  <option value="JP">Japão</option>
                  <option value="GT">Guatemala</option>
                </select>
              </div>

              <div class="col-md-3 mt-3">
                <label for="state">Estado</label>
                <select name="state" class="campos custom-select d-block w-100" id="state" required>
                  <option value="">Selecione...</option>
                  <option value="RJ">RJ</option>
                  <option value="SP">SP</option>
                  <option value="RS">RS</option>
                  <option value="MG">MG</option>
                  <option value="RN">RN</option>
                  <option value="PR">PR</option>
                </select>
              </div>
              
            </div>

            <div class="row" id="transp" style="display: none;">
              
              <div class="col-md-10 mt-3">
                <label for="complemento">Caminhões</label>
                <input type="text" id="caminhao" class="form-control" title="Clique para adicionar os transportes" id="complemento" placeholder="Clique para preencher." value="">
              </div>

              <div class="col-md-1 mt-4">
                <button id="btn_caminhao" style="position: relative;top: 15px;" type="button" class="btn btn-primary btn-lg">Add</button>
              </div>
              
            </div>

            <hr class="mb-4">
            <div class="row mb-3">
              <button id="btn_save" type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
              <input type="hidden" name="gravar" value="cadastrar">
            </div>
          </form>
         </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" scr="js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min.map"> </script>

    <!-- Icons -->
  
    <script type="text/javascript">
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("#btn_caminhao");

        // When the user clicks the button, open the modal 
        $("#btn_caminhao").click(function(){
          modal.style.display = "block";

          $.ajax({
              url : "transporte/transportes.php",
              type : 'GET',
              beforeSend: function(){
                $("#modalContent").html("<p>Carregando...</p>")
              },
              success:function(data){
                $("#modalContent").html(data);
              },
              error: function(data){
                alert("Erro: "+data);
              }
          });  

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

    <script type="text/javascript">
      $(document).ready(function(){      

        $('#TP_DOC').on('change', function() {
          if(this.value==1){
            $("#doc").attr("placeholder", "999.999.999-99");
          }else if (this.value==2) {
            $("#doc").attr("placeholder", "99.999.999/0000-00");
          }
        });

        $('#account_type').on('change', function() {
          //alert(this.value);

          if(this.value==2){
            $("#transp").show();
          }else if (this.value==1) {
            $("#transp").hide();
          }
        });

        $("#zip").keydown(function(e){
          
          if(!(event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 9||(event.keyCode >= 96 && event.keyCode <= 105))){
            
            return false;
          }

        });

        $("#zip").blur(function(){
          
          //busca valor do cep
          var cep = $("#zip").val();
          
          if(cep.length == 8){
              $.ajax({
                 // url : "http://apps.widenet.com.br/busca-cep/api/cep.json?code="+cep,
                  url : "http://viacep.com.br/ws/"+cep+"/json/",
                  type : 'GET',
                  success:function(result){
                  
                    console.log(result);
                    
                    if(result.erro != true){
                      limpaCampos();
                      var estado = result.uf;
                      var cidade = result.localidade;
                      var bairro = result.bairro;
                      var complemento = result.complemento;
                      var rua    = result.logradouro;

                      $("#state").val(estado);
                      $("#bairro").val(bairro);
                      $("#rua").val(rua);
                      $("#cidade").val(cidade);
                      if($("#complemento").val() == ''){
                        $("#complemento").val(complemento);
                      }
                      $("#numero").focus();
                    }else{
                      limpaCampos();
                      alert("O CEP informado não foi encontrado!");
                      $("#rua").focus();
                    }

                  },
                  error: function(result){
                    alert("Erro ao fazer a consulta do CEP.");
                  }
              });
          } 
        }); //Fim do Blur

      }); // Fim do documento ready

      function limpaCampos(){
        $("#state").val('');
        $("#bairro").val('');
        $("#rua").val('');
        $("#cidade").val('');
      }
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