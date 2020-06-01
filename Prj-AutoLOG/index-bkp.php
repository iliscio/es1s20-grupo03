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
    <link href="css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TruckExpress</a>
      <input class="form-control form-control-dark w-100" type="search" placeholder="Pesquisar" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="sair.php">Sair</a>
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
                <a class="nav-link" id="profile" >
                  <span data-feather="users"></span>
                  Perfil
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
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
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
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <div id="corpo">
        
          </div>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!--Link's da navbar-->
    <script type="text/javascript">
      $(document).ready(function(){

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

    <script type="text/javascript">
      $(document).ready(function(){

        $('#profile').click(function(){

          $.ajax({
              url : "profile.php",
              type : 'GET',
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

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
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