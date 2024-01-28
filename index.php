<?php
function gerarKey($txt)
{
	$f = $txt;
	$i = 0;
	while ($i != 100) {
		foreach (hash_algos() as $h1)
			$f = hash($h1, $f);
		$f = hash('md2', $f);
		$i++;
	}
	return $f;
}

function hashh($txt, $key)
{
	$f = $txt;
	$i = 0;
	while ($i != 100) {
		foreach (hash_algos() as $h1)
			$f = hash($h1, $f);
		$f = hash('md2', $f);
		$i++;
	}
	if ($f === $key)
		return true;
	return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
	.sim {
		color: lime;
		font-size: large;
		margin-top: 5px;
		margin-bottom: 20px;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	}

	.nao {
		color: red;
		font-size: large;
		margin-top: 5px;
		margin-bottom: 20px;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	}
	.ct{
		width: 70%;
		margin-left: 15%;
		background-color: #666; 
		border-radius: 20px;
		align-items: center;
		text-align: center;
		margin-top: 40px;
		color: aliceblue;
	}
	h3{
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	}
	html,body{
		margin: 0;
		padding: 0;
		background-color: #333;
	}
	button,input,textarea{
		width: 90%;
		background-color: #333;
		color: aliceblue;
		border: none;
		border-radius: 8px;
		margin-top: 5px;
		margin-bottom: 5px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.vd{
		background-color: rgb(100 200 100);
		color: #333;
	}
	input{
		text-align: center;
	}
</style>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="ct">
		<h3>Breso Version Checker</h3>
	<form action="" method="post">
	<?php
		if (isset($_POST['txt']))
			echo '<textarea name="txt" id="" placeholder="Texto" cols="30" rows="10">'.$_POST['txt'].'</textarea><br>';
		else
			echo '<textarea name="txt" id="" placeholder="Texto" cols="30" rows="10"></textarea><br>';
		?>
		

		<?php
		if (isset($_POST['Gerar']))
			echo '<input type="text" name="key" placeholder="Sua Chave" id="key" value="' . gerarKey($_POST['txt']) . '"><br>';
		else
		{
			if (isset($_POST['key']))
			echo '<input type="text" name="key" placeholder="Sua Chave" id="key" value="'.$_POST['key'].'"><br>';
			else
			echo '<input type="text" name="key" placeholder="Sua Chave" id="key"><br>';
		}
			
		?>

		<button type="submit" name="Verificar" class="vd">Verificar</button><br>
		<button type="submit" name="Gerar" class="vd">Gerar</button><br>
		<?php
		if (isset($_POST['Verificar'])) {
			if (hashh($_POST['txt'], $_POST['key']))
				echo '<br><span class="sim">Versão atualizada</span><br><br>';
			else
				echo '<br><span class="nao">Versão alterada</span><br><br>';
		}
		?>
	</form>
	</div>
	
</body>
<script>

</script>

</html>