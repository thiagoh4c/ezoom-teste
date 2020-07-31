<html>
<head>
    <title>Curso - <?php echo $curso["titulo"] ?></title>

  <script src="<?php echo base_url("js/jquery.min.js") ?>"></script>
  
  <link rel="stylesheet" href="<?php echo base_url("css/web.css") ?>">
    
</head>
<body>
    <div class="container">

        <a href="/">Outros Cursos</a>
        <br />

        <div class="topoBackground">
            <img src="<?php echo base_url("images/".$curso["imagem_principal"]);?>" class="btnDeletar">
        </div>

        <h3 align="center" class="tituloCurso"><?php echo $curso["titulo"] ?></h3>
        <br />
        
        <div class="panel panel-default">

            <div class="exibir">                     
                <div class="item">
                    <div class="div-descricao">
                        <span>
                           <?php echo $curso["descricao"] ?>
                        </span>
                    </div>
                    <div class="panel">
                        <?php if(!empty($curso["imagens"])){ ?>
                            <h3>Imagens do curso</h3>
                        <?php } ?>  
                        <div class="div-imagens">
                            <?php foreach ($curso["imagens"] as $img): ?>
                                <?php if($img["principal"] != 1): ?>   
                                <img src="<?php echo base_url("images/".$img["imagem"]);?>" class="btnDeletar">
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
