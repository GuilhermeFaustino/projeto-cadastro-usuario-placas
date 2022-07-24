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
                <form class="p-4 p-md-5 border rounded-3 bg-light"  name="formcadastro" method="post" action="">
                  <label class="mb-2">Editar Usuario</label>
                       <?php
                           if(isset($_POST['cadastroUser'])){
                                $eUser['id'] =            filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                                $eUser['nome'] =               filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
                                $eUser['sobrenome'] =            filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
                                $eUser['email'] =                filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
                                $eUser['password'] =           md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
                                $eUser['telefone'] =            filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
                                $eUser['data'] =                date("Y-m-d H:i:s");
                           if(in_array('', $eUser)){
                               echo '<div class="alert alert-warning" role="alert">Favor preencher todos os campos. </div>';
                             }else{                                  
                                update('user', $eUser, "id='$eUser[id]'");
                                echo '<div class="alert alert-success" role="alert">Usuario Editado Com Sucesso.</div>';
                                header("Refresh: 1;url=dashboard.php");                               
                            }                            
                        }
                        $eUser['id'] =            filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                        $readUser = read('user',"id=$eUser[id]");
                        if($readUser){
                            foreach($readUser as $user){
                                $senha = $user['password'];
                                echo '<div class="form-floating mb-3">
                                <input  class="form-control" name="nome" value="'.$user['nome'].'" placeholder="Nome">
                                <label for="inputEmail">Nome</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input  class="form-control" name="sobrenome" value="'.$user['sobrenome'].'" placeholder="Sobrenome">
                                <label for="inputEmail">Sobrenome</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input  class="form-control" name="email" value="'.$user['email'].'" placeholder="E-mail">
                                <label for="inputEmail">Email</label>
                            </div>  
                            <div class="form-floating mb-3">
                                <input  type="password" class="form-control" name="password" value="'.$user['password'].'" placeholder="Senha">
                                <label>Senha</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input  class="form-control" name="telefone" value="'.$user['telefone'].'" placeholder="Telefone">
                                <label for="inputPassword">Telefone</label>
                            </div>
    
                          <button  type="submit" name="cadastroUser" class="btn btn-lg btn-success mb-2" href="cadastro.php">Editar</button>
                          <a class="btn btn-lg btn-success mb-2" type="submit"  href="dashboard.php">Voltar</a>';
                            }
                        }
                       ?>
                        
                </form>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>