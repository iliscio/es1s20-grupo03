<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" scr="js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min.map"> </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script type="text/javascript">
        // Get the modal
        var modal = document.getElementById("myModal");

        // When the user clicks the button, open the modal 
        $("#btn_caminhao").click(function(){
          modal.style.display = "block";

          $.ajax({
              url : "transporte/transportes.php",
              type : 'GET',
              beforeSend: function(){
                $("#modalContent").html("<p>Carregando perfil</p>")
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

        $(".campos").prop("disabled",true);
      

      $("#zip").keydown(function(e){
        
        if(!(event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8|| event.keyCode == 9 ||(event.keyCode >= 96 && event.keyCode <= 105))){
          
          return false;
        }

      });

        
        $("#btn_atualiza").click(function(){
           $(".campos").prop("disabled",false);
           $("#btn_atualiza").prop("disabled",true);
        });

        $("#btn_save").click(function(){
          // $(".campos").prop("disabled",true);
           $("#btn_atualiza").prop("disabled",false);


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