<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>MktMigrate</title>

	<!-- Bootstrap core CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $this->Html->css(array('/MktMigrate/css/codemirror', '/MktMigrate/css/default')) ?>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>

    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img alt="Mkt Virtual" src="http://www.mktvirtual.com.br/wp-content/themes/mktvirtual/imagens/mktvirtual.gif"></a>
        </div>
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h3>Mkt Migrate Plugin For CakePHP</h3>
        <p>Plugin responsável pela manipulação de querys no banco de dados, deve ser administrado logo após o deploy da aplicação!</p>
        <p>
			<!-- <a class="btn btn-primary btn-lg" role="button">Visualizar Schema</a>
						<a class="btn btn-primary btn-lg" role="button">Comparar Schema</a> -->
		</p>
      </div>
    </div>

	<div class="container">
		<?php echo $this->element('flash') ?>
		<?php echo $this->fetch('content') ?>
		<hr>
		<footer>
			<p>&copy; Plastic 2014</p>
		</footer>
	</div>
	
	<?php echo $this->Html->script(array(
		'/MktMigrate/js/jquery-1.11.0.min',
		'/MktMigrate/js/bootstrap.min',
		'/MktMigrate/js/codemirror/codemirror',
		'/MktMigrate/js/codemirror/mode/mysql'
	)); ?>
	<?php echo $this->fetch('script') ?>
</body>
</html>