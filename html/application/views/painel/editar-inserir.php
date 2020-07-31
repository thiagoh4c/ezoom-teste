<html>
<head>
  <title>Editar inserir Painel</title>
  <script src="<?php echo base_url("js/jquery.min.js") ?>"></script>
  <script src="<?php echo base_url("js/main.js") ?>"></script>
  <script>let imgPrincipal = null;</script>

  <link rel="stylesheet" href="<?php echo base_url("css/painel.css") ?>">
</head>
<body>
    <div class="container">

        <a href="/painel">Voltar</a>

        <h3 align="center"><?php echo $editar ? $curso["titulo"]. " - Editar" : "Insira um curso"; ?></h3>

        <?php if(isset($editado)){ ?>
        <div class="panel success">
          <div class="panel">Curso salvo com sucesso</div>
        </div>
        <?php } ?>

        <div class="panel">

            <form method="post" id="editar-inserir" action="/painel/<?php echo $editar ? "editar/".$curso["id"] : "inserir"; ?>" enctype="multipart/form-data">

              <?php if($editar): ?>
                <input type="hidden" name="imagem_principal" id="imagem_principal" value="<?php echo $curso["id_imagem_principal"]; ?>">
              <?php endif; ?>

              <div class="form-line">
                <label for="titulo">Título</label>
                <input type="text" class="form-input" id="titulo" name="titulo" placeholder="Título" value="<?php echo $editar ? $curso["titulo"] : ""; ?>">
              </div>

              <div class="form-line">
                <label for="descricao">Descrição</label>
                <textarea class="form-input" id="descricao" name="descricao" placeholder="Descrição">
                  <?php echo $editar ? $curso["descricao"] : ""; ?>
                </textarea>
              </div>

               <div class="form-line">
                <input type="file" class="form-input" id="files" multiple="multiple" accept="image/x-png,image/gif,image/jpeg" name="imagens[]">
                <div class="panel">
                  <a href="javascript:;" id="escolher-imagens">Escolher imagens</a>
                </div>
              </div>

              <div class="galeria row panel">

                <?php 
                if(isset($curso)):
                  foreach($curso["imagens"] as $img): ?>
                      <div class="col-3">
                        <img src="<?php echo base_url("images/".$img["imagem"]);?>" class="imgCurso <?php echo $img["principal"] ? 'principal' : '';?>" data-id="<?php echo $img["id"];?>">
                      </div>
                  <?php 
                  endforeach; 
                endif;
                ?>

              </div>
              <div class="panel centered ">
                <a id="submit" class="btnAction bigButton" href="javascript:;">Salvar</a>
              </div>
            </form>

        </div>
    </div>

</body>
</html>
