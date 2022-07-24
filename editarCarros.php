<?php
 ob_start();
 session_start();
  require_once __DIR__ ."/dts/config.php";
  require_once __DIR__ . "/dts/dbaSis.php"; 
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
                    if(isset($_POST['cadastroUser'])){
                            $e['id'] =                filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                            $e['modelo'] =            filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_SPECIAL_CHARS);
                            $e['ano'] =                  filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_SPECIAL_CHARS);
                            $e['placa'] =               filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);
                            $e['cor'] =                  filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_SPECIAL_CHARS);
                            
                         if(in_array('',$e)){
                           echo '<div class="alert alert-warning" role="alert">Favor Preencher Todos os Campos. </div>';
                         }else{
                            update('carros',$e,"id='$e[id]'");
                           echo '<div class="alert alert-success" role="alert">Carro Editado com Sucesso. </div>';
                          }
                      }
                      $edit['id'] =                filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);  
                      $read = read('carros',"id='$edit[id]'");
                     if($read){
                      foreach($read as $car){
                        echo '<form class="p-4 p-md-5 border rounded-3 bg-light"  name="formcadastro" method="post" action="">
                        <label class="mb-2">Editar Carro</label>
                             <div class="form-floating mb-3">
                                 <input class="form-control" name="modelo" value="'.$car['modelo'].'" placeholder="">
                                 <label for="inputEmail">Modelo</label>
                             </div>
                             <div class="form-floating mb-3">
                                 <input  class="form-control" name="ano" value="'.$car['ano'].'" placeholder="Ano de Fabricacao">
                                 <label for="inputEmail">Ano de Fabricacao</label>
                             </div>
                             <div class="form-floating mb-3">
                                 <input class="form-control" name="placa" value="'.$car['placa'].'" placeholder="Placa">
                                 <label for="inputEmail">Placa</label>
                             </div>  
                             <div class="form-floating mb-3">
                                 <input class="form-control" name="cor" value="'.$car['cor'].'" placeholder="Cor">
                                 <label for="inputPassword">Cor</label>
                             </div>
                             <button  type="submit" name="cadastroUser" class="btn btn-lg btn-success mb-2" href="cadastro.php">Editar</button>      
                             <a class="btn btn-lg btn-success mb-2" type="submit"  href="dashboard.php">Voltar</a>
                     </form>';
                      }
                     }
                ?>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>