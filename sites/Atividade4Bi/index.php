<?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {
    $_SESSION['usuario_logado'] = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="Assets/images/logo.png" type="image/png">
    <title>Deco Home - Início</title>
</head>
<body>
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
        <?php echo "Olá, ".htmlspecialchars($_SESSION['name']); ?>
       <a href="user.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></a>
    <?php endif; ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
        <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
      </svg>
    </div>
  </div>
  <div class="menu-principal">
    <ul>
      <li><a href="">HOME</a></li>
      <div class="dropdown">
      <li><a href="" class="dropbtn">COMPRA</a></li>
      <div class="dropdown-content">
        <a href="">POPULAR</a>
        <a href="">RECOMENDADO</a>
        <a href="">NOVOS</a>
      </div>
    </div>
      <li><a href="">NOVO</a></li>
      <li><a href="">SOBRE</a></li>
      <li><a href="">CONTATO</a></li>
    </ul>
  </div>
  <div class="Rcontainer-banner">
    <div class="message-banner">
      <h1>Deco's Home</h1>
      <p>A decoração certa para você.</p>
    </div>
  </div>
  <div class="container-banner">
    <img src="assets/images/banner.png" alt="">
    <div class="message-banner">
      <div class="text-message">
        <span>NOSSOS FAVORITOS</span><br>
        <a href="">COMPRE AGORA</a>
      </div>
    </div>
  </div>
  <div class="divisoria1"></div>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <span class="container-title">NOVOS PRODUTOS</span>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <ul class="card-list">
        <li class="card-item">
          <a href="" class="card-link">
            <img src="Assets/images/produtos/1.png" alt="produtos - vaso" class="card-image">
            <h4 class="card-title">Vaso de flor</h4>
            <span class="card-desc">Dourado simples</span>
            <p class="card-price">R$50,00</p>
          </a>
        </li> 
        <li class="card-item">
          <a href="" class="card-link">
            <img src="Assets/images/produtos/4.png" alt="produtos - vaso" class="card-image">
            <h4 class="card-title">Vaso de flor</h4>
            <span class="card-desc">Transparente</span>
            <p class="card-price">R$30,00</p>
          </a>
        </li> 
        <li class="card-item">
          <a href="" class="card-link">
            <img src="Assets/images/produtos/7.png" alt="produtos - vaso" class="card-image">
            <h4 class="card-title">Vaso de flor</h4>
            <span class="card-desc">Barro</span>
            <p class="card-price">R$13,90</p>
          </a>
        </li> 
      </ul>
      </div>
      <div class="carousel-item">
        <ul class="card-list">
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/2.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Escultura</h4>
              <span class="card-desc">mulher olhando</span>
              <p class="card-price">R$50,00</p>
            </a>
          </li>
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/5.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Escultura</h4>
              <span class="card-desc">bebe tocando</span>
              <p class="card-price">R$50,00</p>
            </a>
          </li>
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/8.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Escultura</h4>
              <span class="card-desc">homem lendo</span>
              <p class="card-price">R$50,00</p>
            </a>
          </li>
        </ul>
      </div>
      <div class="carousel-item">
        <ul class="card-list">
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/3.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Vela Aromática</h4>
              <span class="card-desc">Capim Limão</span>
              <p class="card-price">R$70,00</p>
            </a>
          </li>
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/6.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Vela Aromática</h4>
              <span class="card-desc">Lavanda</span>
              <p class="card-price">R$90,00</p>
            </a>
          </li>
          <li class="card-item">
            <a href="" class="card-link">
              <img src="Assets/images/produtos/9.png" alt="produtos - vaso" class="card-image">
              <h4 class="card-title">Vela Aromática</h4>
              <span class="card-desc">Baunilha</span>
              <p class="card-price">R$50,00</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <a class="carousel-control-prev custom-btn" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next custom-btn" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>
  <div class="divisoria1"></div>
  <!-- <div class="container-story">
    <div class="story-text">
        <span>NOSSA HISTÓRIA</span>
        <p>Bem-vindo à Deco Home, onde cada espaço se transforma em um lar cheio de estilo e personalidade! Fundada em 1970 por Alexandro Marwin, nossa empresa nasceu da paixão por criar ambientes que refletem a essência de quem os habita. Desde o início, nossa missão tem sido tornar a decoração acessível e inspiradora, oferecendo serviços personalizados e uma curadoria especial de produtos que vão de móveis a acessórios exclusivos.</p>
          <p>Acreditamos que cada detalhe conta e trabalhamos com materiais de alta qualidade, sempre atentos às últimas tendências. Além disso, buscamos incorporar práticas sustentáveis em nossos processos, garantindo que sua casa não seja apenas bonita, mas também responsável. Explore nossas coleções e permita que a Deco Home ajude você a dar vida ao espaço que você ama!
        </p>
    </div>
    <div class="story-image">
        <img src="Assets/images/story.jpeg" alt="fundador da empresa">
    </div>
  </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>