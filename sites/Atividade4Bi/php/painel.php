<?php
    include 'conection.php';
    include 'protect.php';
    // Verifica se o usuário está logado
    if (!isset($_SESSION['id'])) {
        header("Location: ../login.html");
        exit();
    }

    
    $id = $_SESSION['id'];
    $sql = "SELECT Nome, Sobrenome, Email, idade, Endereco, imagem FROM usuarios WHERE id=$id";
    $result = $mysqli->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['name'] = $user['Nome'];
        $_SESSION['Sname'] = $user['Sobrenome'];
        $_SESSION['email'] = $user['Email'];
        $_SESSION['idade'] = $user['idade'];
        $_SESSION['endereco'] = $user['Endereco'];
        $_SESSION['imagem'] = $user['imagem'];
    } else {
        echo "Erro ao carregar dados do usuário.";
        exit();
    }

    $sqlCliente = "SELECT id, Nome, Sobrenome, Email, idade , Endereco FROM Usuarios WHERE tipo = 1";
    $resultCliente = $mysqli->query($sqlCliente);
    
    $mysqli->close();
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/painel.css">
    <link rel="icon" href="../Assets/images/logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Painel - Deco's Home</title>
</head>
    <body>
    <main>
            <div class="menu-faixa">
                <div class="menu-btn" id="menuBtn">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg></a>   
                </div>
                <div class="text-menu">
                    <span>Painel Administrativo</span>
                </div>
                <div class="back-btn">
                    <a href="../index.php"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg></button></a>
                    </div>
            </div>
            <div class="menu-principal hidden">
                <ul>
                    <li id="home" class="actived">Home</li>
                    <li id="conta">Conta</li>
                    <li id="clientes">Clientes</li>
                    <li id="Produtos">Produtos</li>
                    <li id="pedidos">Pedidos</li>
                </ul>
            </div>
            <div class="content">
                <div class="home">
                    <div class="content-home">
                        <div class="home-text">
                            <p>Bem vindo(a) ao painel Administrativo, <nav></nav>
                            <?php echo $_SESSION["name"] ."!"?>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="conta">
                <div class="content-conta">
                <form action="updateCli.php" method="post" id="updateForm" enctype="multipart/form-data">
                <div class="line">    
                <div class="content-image">
                    <img id="perfil" src="<?php echo $_SESSION['imagem'] ? $_SESSION['imagem'] : '../Assets/images/conta.png'; ?>" alt="user profile picture">
                        <label for="upload" class="upload-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </label>
                        <input type="file" name="upload" id="upload" accept="image/*" disabled>
                    </div>
                        
                    <div class="nome">
                        <label for="name">Nome</label><br>
                        <input type="text" name="name" id="name" class="inputReadOnly" value="<?php echo $_SESSION['name']; ?>" readonly>
                    </div>
                    <div class="Snome">
                        <label for="Sname">Sobrenome</label>
                        <input type="text" name="Sname" id="Sname" class="inputReadOnly" 
                        value="<?php echo $_SESSION['Sname']; ?>" readonly>
                    </div>
                    </div>
                    <div class="line">
                    <div class="idade">
                        <label for="idade">Idade</label><br>
                        <input type="text" name="idade" id="idade" class="inputReadOnly" value="<?php 
                            echo $_SESSION['idade'];
                        ?>" readonly></div>
                    <div class="email">
                        <label for="email">E-mail</label><br>
                        <input type="email" name="email" id="email" class="inputReadOnly" value="<?php 
                            echo $_SESSION['email'];
                        ?>" readonly>
                    </div>  
                    <div class="id">
                        <label for="id">Código</label><br>
                        <input type="text" name="id" id="id" value="<?php 
                            echo $_SESSION['id'];
                        ?>" readonly>
                    </div>
                    </div>
                    <div class="endereco">
                        <label for="endereco">Endereço</label><br>
                        <input type="text" name="endereco" id="endereco" class="inputReadOnly" 
                        value="<?php echo $_SESSION['endereco'] ;?>" readonly>
                    </div>
                    </div>
                    <div class="btnsConta">
                        <input type="button" href="" class="btn-editar" value="Editar" id="btnEditar">
                        <input type="submit" href="" class="btn-salvar" value="Salvar" id="btnSalvar"  data-id="<?php echo $_SESSION['id']; ?>" disabled>
                    </div>  
                    </div>
                    </form>

                <div class="clientes">
                    <div class="clientes-center">
                <div class="container-espace">
      <div class="container-table">
      <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Idade</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
          <tbody>
          <?php
            if ($resultCliente->num_rows > 0) {
                while ($row = $resultCliente->fetch_assoc()) {     
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["Nome"] . "</td>
                        <td>" . $row["Sobrenome"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["idade"] . "</td>
                        <td>" . $row["Endereco"] . "</td>
                        <td> 
                            <a class='btn-edit' href='update.php?id=" . $row["id"] . "'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
  <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325\"/>
</svg></a>
                            <a class='btn-delete' href='delete.php?id=" . $row["id"] . "'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"Red\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                            <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z\"/>
                            <path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z\"/>
                          </svg></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
            }
            
          ?>
        </tbody>
      </table>
      </div>
      </div>
      </div>
    </div>
                </div>
                <div class="produtos">

                </div>
                <div class="pedidos">

                </div>
</div>
                
        </main>
                <script src="../Assets/js/painel.js"></script>
    </body>
</html>