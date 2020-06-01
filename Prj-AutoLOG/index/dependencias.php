<link rel="stylesheet" href="css/jquery-ui.css" />

    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/jquery-ui.js"></script>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>