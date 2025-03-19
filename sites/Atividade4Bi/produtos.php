<?php
include 'php/conection.php';

if (!isset($_SESSION['usuario_logado'])) {
    $_SESSION['usuario_logado'] = false;
}

// Garante que o carrinho exista
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = [];
}

$totalItens = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $totalItens += $item['quantidade'];
    }
}

$query = "SELECT id, nome, descricao, preco, imagemPro FROM produtos";
$result = $mysqli->query($query);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="Assets/images/logo.png" type="image/png">
    <title>Deco Home - Produtos</title>
</head>
<body>
<div class="Rmenu-faixa">
    <div class="menu-btn" id="RmenuBtn">
      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
      </svg></a>   
    </div>
    <div class="text-menu">
      <span>DECO HOME</span>
    </div>
    </div>
    <div class="Rmenu-principal hidden">
      <ul>
      <a href="index.php"><li id="home" class="actived">Home</li></a>
        <a href="user.php"><li id="conta">Conta</li></a>
        <a href="produtos.php"><li id="produtos">Produtos</li></a>
        <a href="carrinho.php"><li id="carrinho">Carrinho</li></a>
      </ul>
    </div>
  <div class="ad-up">
    <p>NOVA COLEÇÃO CHEGANDO 20 DE DEZEMBRO.
    <?php if ($_SESSION['usuario_logado'] === false): ?>
      <a href="login.html"><u>FAÇA LOGIN</u></a>
    <?php endif; ?>
      </p>
  </div>
  <div class="menu-faixa">
    <div class="input-search">
        <input type="search" name="search" id="search" placeholder="PESQUISAR...">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
    </div>
    <span>DECO HOME</span>
    <div class="login-car">
    <?php if (!$_SESSION['usuario_logado']): ?>
        <a href="login.html">LOGIN</a>
    <?php else: ?>
        <?php echo "Olá, " . htmlspecialchars($_SESSION['name']); ?>
        <?php if ($_SESSION['tipo'] == 1): ?>
            <a href="user.php">
        <?php elseif ($_SESSION['tipo'] == 2): ?>
            <a href="php/painel.php">
        <?php endif; ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg></a>

        <?php if ($_SESSION['tipo'] == 1): ?>
            <div class="cart">
                <a><?php echo $totalItens; ?></a>
                <a href="carrinho.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                    <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                  </svg>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

  </div>
  <div class="menu-principal">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="" >NOVOS</a></li>
      <li><a href="">POPULAR</a></li>
      <li><a href="">RECOMENDADOS</a></li>
    </ul>
  </div>

    <div class="container-allProducts">
        <div class="linha">
            <?php 
                while ($produto = $result->fetch_assoc()): ?>
            <div class="card" style="width: 18rem;">
                <img src="Assets/images/produtos/<?php echo basename($produto['imagemPro']); ?>" alt="produto - <?php echo $produto['nome']; ?>" class="card-image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                        <p class="card-text"><?php echo $produto['descricao']; ?></p>
                        <div class="precoCompra">
                        <span class="card-price">R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                        <a href="<?php echo $_SESSION['usuario_logado'] ? "php/adicionar_ao_carrinho.php?id={$produto['id']}" : 'login.html'; ?>" class="">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
        <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
    </svg>
</a>

                        </div>
                </div>
            </div>
<?php endwhile; ?>
</div>
  </div>
  <div class="divisoria1"></div>
  <footer>
    <div class="line"></div>
    <div class="text-footer">
      Desenvolvido por Beatriz Oliveira
      <br>
      Deco Home &copy;2024
    </div>
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
      </svg>
    </div>  
  </footer>
    <script src="Assets/js/produtos.js"></script> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>