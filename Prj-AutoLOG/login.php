<?php
  require_once("php/head.php");
  require_once("login/dependencias.php");
  require_once("login/body.php");
?>

    <form action="funcao.php" method="POST" enctype="multipart/form-data">

     <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="logo do site" width="72" height="72">-->
      <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="lembrar"> Lembrar de mim
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      
      <input type="hidden" name="entrar" value="login">
      <a align="center" style="text-decoration: none" href="cadastro.php">Cadastrar-se</a>  
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
        
<?php
  require_once("login/rodape.php");
?>