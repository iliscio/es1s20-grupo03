
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
            url : "get-contract.php",
            type : 'GET',
            data: { 'idQuery':3 },
            beforeSend: function(){
              $("#closed-content").html("<p>Carregando inicio</p>")
            },
            success:function(data){pending_contract
              $("#closed-content").html(data);
            },
            error: function(data){
              alert("Erro: "+data);
            }
         });  
      });

    </script>

  </body>
</html>
