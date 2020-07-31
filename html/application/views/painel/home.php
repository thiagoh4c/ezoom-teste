<html>
<head>
  <title>Home Painel</title>
    
  <script src="<?php echo base_url("js/jquery.min.js") ?>"></script>
  <script src="<?php echo base_url("js/main.js") ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url("css/painel.css") ?>">
    
</head>
<body>
    <div class="container ">

        <h3 align="center">Painel de gerenciamento de cursos</h3>

        <?php if(isset($deleted)){ ?>
        <div class="panel danger">
          <div class="panel">Curso deletado com sucesso</div>
        </div>
        <?php } ?>
        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div>
                        <h3 class="panel-title">Tabela de Cursos</h3>
                    </div>
                    <div align="right">
                        <a  href="/painel/inserir" id="add_button" class="btnAction">Adicionar</a>
                    </div>
                </div>
            </div>
            <div class="panel">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th class="td-titulo">Título</th>
                            <th class="td-acao"></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($cursos as $curso): ?>                        
                        <tr>
                            <td class="td-titulo">#<?php echo $curso["id"] ?> <?php echo $curso["titulo"] ?></td>
                            <td class="td-acao "><a href="/painel/editar/<?php echo $curso["id"]; ?>">Edit</a> - <a href="javascript:;" data-id="<?php echo $curso["id"]; ?>" class="btnDeletar">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                        
                </table>
            </div>
        </div>
    </div>

</body>
</html>