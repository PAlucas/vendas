<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="/compras/css/bootstrap.min.css" rel="stylesheet">
    <script src="/compras/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

</head>
<body>
    <?php
    
    $pesquisa = $_POST['busca'] ?? '';

    include "connexion_clientes.php";

    $sql = "SELECT * FROM clientes WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($connect, $sql);
    ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Pesquisa Produtos</a>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </ul>
        <form class="d-flex" action="pesquisa_clientes.php" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php   
        while($linha = mysqli_fetch_assoc($dados)){
            $cod_pessoa = $linha['cod_pessoa'];
            $nome = $linha['nome'];
            echo "<tr>
            <th scope='col'>$cod_pessoa</th>
            <th scope='col'>$nome</th>
                  </tr>";
        }
    ?>
  </tbody>
</table>
</body>  