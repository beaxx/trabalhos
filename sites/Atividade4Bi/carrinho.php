<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Deco's Home</title>
    <link rel="stylesheet" href="Assets/css/carrinho.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="Assets/images/logo.png" type="image/png">

</head>
<body>
    <div class="Rmenu-faixa">
        <div class="menu-btn" id="RmenuBtn">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
            </a>   
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
                    </svg>
                </a>
        <?php endif; ?>
        </div>
    </div>
    <div class="menu-principal">
        <ul>
            <a href="index.php"><li>HOME</li></a>
            <div class="dropdown">
            <a href="produtos.php" class="dropbtn"><li>PRODUTOS</li></a>
                <div class="dropdown-content">
                    <a href="">POPULAR</a>
                    <a href="">RECOMENDADO</a>
                    <a href="">NOVOS</a>
                </div>
            </div>
            <li><a href="#carouselExampleControls">NOVO</a></li>
            <li><a href="">SOBRE</a></li>
            <a href="index.php#contato"><li>CONTATO</li></a>
        </ul>
    </div>

    <div class="content">

        <span>SEU CARRINHO</span>
        <div class="container-content">
            <?php if (empty($_SESSION['carrinho'])): ?>
                <p>Seu carrinho está vazio.</p>
            <?php else: ?>
                <?php 
                    $total = 0;
                    foreach ($_SESSION['carrinho'] as $id => $item): 
                        $subtotal = $item['preco'] * $item['quantidade'];
                        $total += $subtotal;
                ?>
                <div class="container-produtos">
                        <div class="produto">
                            <img src="Assets/images/produtos/<?php echo basename($item['imagem']); ?>" alt="produto - <?php echo $item['nome']; ?>" >
                                <div class="text-produto">
                                    <span><?php echo $item['nome']; ?></span> 
                                    R$<?php echo number_format($item['preco'], 2, ',', '.'); ?>                
                                        <div class="inner-text">
                                        <form method="post" action="php/atualizar_carrinho.php">
                                            <input type="number" name="quantidade" value="<?php echo $item['quantidade']; ?>" min="1" class="input-quantidade">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <a href="php/remover_item.php?id=<?php echo $id; ?>" class="btnRemove">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="menu-end">
                        <div class="total">
                            <strong>Total</strong>
                            R$<?php echo number_format($total, 2, ',', '.'); ?>         
                        </div>
                        <a href="finalizar_compra.php" class="btn btn-primary">Finalizar Compra</a>
                <?php endif; ?>
                    </div>
                </div>
        </div>
    </div>
    <script src="Assets/js/carrinho.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
