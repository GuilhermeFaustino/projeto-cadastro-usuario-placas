<?php
ob_start();
session_start();
    require_once __DIR__ ."/dts/config.php";
    require_once __DIR__ . "/dts/dbaSis.php";     
    $session = $_SESSION['$autUser'];
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
            <div class="col-md-10 mx-auto ">   
                    <?php
                    if(isset($_GET['excluircarro'])){
                        $id =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                        $delCar = delete('carros',"id='$id'");
                        header('Location: dashboard.php');
                        echo '<div class="alert alert-success" role="alert">Carro Deletado com Sucesso.</div>';
                    }
                    $readUser = read('user',"id='$session[id]'");
                     if(!$readUser){
                            echo '<div class="alert alert-danger" role="alert">Não Usarios Cadastrado. </div>';
                        }else{                       
                       foreach($readUser as $user){
                        echo '
                        <table class="table table-bordered">
                             <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Sobrenome</th>
                                        <th scope="col">E-mail</th>
                                        <th colspan="2">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><th scope="row">'.$user['id'].'</th>
                                        <td>'.$user['nome'].'</td>
                                        <td>'.$user['sobrenome'].'</td>
                                        <td>'.$user['email'].'</td>
                                        <td><a  type="submit"  class="btn btn-lg btn-success mb-2" href="editarUser.php?id='.$user['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                      </svg></a></td>                                     
                                    </tr>                   
                                </tbody>
                        </table>'; 
                     echo '<label>Carros do Usuario: '.$session['nome'].' '.$session['sobrenome'].'</label>';
                     $carro = read('carros', "idCarros='$user[id]'");                     
                    if(!$carro){
                        echo '<div class="alert alert-danger" role="alert">Não existe Carros Cadastrados para o usuario. </div>';
                    }else{
                        foreach($carro as $car){
                            echo '<table class="table table-bordered">                     
                            <thead>
                                   <tr>
                                       <th scope="col">Nome</th>
                                       <th scope="col">Ano Fabircão</th>
                                       <th scope="col">Placa</th>
                                       <th scope="col">Cor</th>
                                       <th colspan="2">Editar</th>
                                       <th scope="col">Excluir</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">'.$car['modelo'].'</th>
                                       <td>'.$car['ano'].'</td>
                                       <td>'.$car['placa'].'</td>
                                       <td>'.$car['cor'].'</td>
                                       <td><a  type="submit"  class="btn btn-lg btn-success mb-2" href="editarCarros.php?id='.$car['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                       <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                     </svg></a></td>
                                       <td colspan="2"><a  type="submit"  class="btn btn-lg btn-success mb-2" href="dashboard.php?excluircarro&id='.$car['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                       <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                       <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                     </svg></a></td>
                                   </tr>                   
                               </tbody>
                       </table>';                          
                        }
                       
                    }
                }
                echo  '<a  type="submit" name="cadastroUser" class="btn btn-lg btn-success mb-2" href="cadastroCarros.php?id='.$session['id'].'">Cadastro Carros</a>
                <a  type="submit" name="cadastroUser" class="btn btn-lg btn-success mb-2" href="logoff.php">Sair</a>'; 
            }
                    ?>
                       
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<?php
ob_end_flush();
?>