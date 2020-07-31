<html>
<head>
    <title>Login Painel</title>
    
  <script src="<?php echo base_url("js/jquery.min.js") ?>"></script>
  
  <link rel="stylesheet" href="<?php echo base_url("css/painel.css") ?>">
  <script src="<?php echo base_url("js/login.js") ?>"></script>
    
</head>
<body>

<div class="container">
    <div class="panel login">

      <h3>Login</h3>
      <?php if(isset($error)){ ?>
      <div class="panel danger">
        <div class="panel">Username e/ou senha incorretos</div>
      </div>
      <?php } ?>

      <form method="post" id="form-login" action="/painel/check">

        <div class="form-line">
          <label for="username">Título</label>
          <input type="text" class="form-input" id="username" name="username" placeholder="Username">
        </div>

        <div class="form-line">
          <label for="senha">Senha</label>
          <input type="text" class="form-input" id="senha" name="password" placeholder="Senha">
        </div>

        <div class="form-line">
          <div class="panel centered ">
            <a id="submit" class="btnAction bigButton" >Salvar</a>
          </div>
        </div>
        
      </form>
    </div>
</div>
</body>
</html>
