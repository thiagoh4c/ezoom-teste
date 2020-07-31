<html>
<head>
  <title>Listagem de Cursos</title>

  <script src="<?php echo base_url("js/jquery.min.js") ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url("css/web.css") ?>">
    
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Cursos</h3>
        <br />
        <div class="panel panel-default">

            <div class="listagem">
            <?php foreach ($cursos as $curso): ?>                        
                <div class="item">
                    <div class="div-titulo">
                        <span>
                            <a href="/curso/exibir/<?php echo $curso["id"] ?>"><?php echo $curso["titulo"] ?></a>
                        </span>
                    </div>
                    <div class="div-img ">
                        <img src="<?php echo base_url("images/".$curso["imagem_principal"]);?>" class="btnDeletar">
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
