<?php
ob_start();
session_start();
require_once __DIR__ ."/dts/config.php";
require_once __DIR__ . "/dts/dbaSis.php"; 
date_default_timezone_set('America/Recife');
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-4">
        <div class="row align-items-center">
            <div class = "col-md-10 mx-auto col-lg-5">
              <?php
                if(isset($_POST['login'])){
                  $user['user'] =                   filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
                  $user['password'] =               filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);  
                         
                     //$readUser = read('user', "email='$user[user]'");
                  if(in_array('',$user)){
                        echo '<div class="alert alert-warning" role="alert">Campos em Brancos, Favor Preencher. </div>';
                    }elseif(!$user['user'] || !filter_var($user['user'], FILTER_VALIDATE_EMAIL)){
                          echo '<div class="alert alert-warning" role="alert">Email Invalido. </div>';                        
                                               
                    }else{
                        $uEmail = $user['user'];
                        $uSenha = md5($user['password']);
                        $readUser = read('user', "email='$user[user]'");
                        if(!$readUser){
                          echo '<div class="alert alert-danger" role="alert">Email ou Senha Incorretos. </div>';
                        }else{
                          foreach($readUser as $autUser){
                              header('Location: dashboard.php');
                              $_SESSION['$autUser'] = $autUser;        
                          }                
                        }                                                  
                  }                  
               }
              ?>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="user" placeholder="E-mail">
                            <label>Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" name="password" placeholder="Senha">
                            <label>Senha</label>
                        </div>
                        <a  class="btn btn-lg btn-success mb-2" href="cadastro.php"> Cadastro </a>
                        <button class="btn btn-lg btn-success mb-2" name="login" type="submit">Entrar</button>
                </form>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
<?php
ob_end_flush();
?>