 </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script type="text/javascript" scr="js/jquery-3.4.1"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min"> </script>
    <script type="text/javascript" scr="js/jquery-3.4.1.min.map"> </script>

    <!-- <script src="js/bootstrap.min.js"></script> -->
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
          url : "inicio.php",
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

    <script type="text/javascript">
      $(document).ready(function(){

        $('#profile').click(function(){
          $.ajax({
              url : "profile.php",
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
                url : "pending_contract.php",
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
                url : "closed_contracts.php",
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
              url : "inicio.php",
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
              url : "history.php",
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