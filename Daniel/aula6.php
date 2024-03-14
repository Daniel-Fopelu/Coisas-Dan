<?php
 /* se chegou tabela por POST, desserializa ela. caso contrário cria uma nova array */
 $tabela  =  (isset($_POST['tabela'])) ? unserialize($_POST['tabela']) : [];
 
 /* exc determina o indice do vetor que deve ser removido */
 if(isset($_POST['exc']) && $_POST['exc']!=""){
	 
    /* transforma exc em inteiro e remove um elemento a partir da posicao de exc */
	array_splice( $tabela , intval($_POST['exc']),1); 
		 
 /* car determina o indice do vetor que deve ser carregado para edição */
 } else if(isset($_POST['car']) && $_POST['car']!=""){
	
	$atu=$_POST['car'];  // move car para atu a fim de marcar o elemento a ser editado */
	$logradouro = $tabela[ intval($_POST['car']) ]['logradouro']; // cria a variavel homonima
	$numero = $tabela[ intval($_POST['car']) ]['numero'];
	$bairro = $tabela[ intval($_POST['car']) ]['bairro'];
	$cidade = $tabela[ intval($_POST['car']) ]['cidade'];
	$uf = $tabela[ intval($_POST['car']) ]['uf'];
	$cep = $tabela[ intval($_POST['car']) ]['cep'];
	
 /* atu determina o registro que deve ser atualizado */ 
 } else if(isset($_POST['atu']) && $_POST['atu']!=''){
	
	/* o registro anterior sera substituido pelo novo registro */
	$novo = [];
	$novo['logradouro']=$_POST['logradouro'];
	$novo['numero']=$_POST['numero'] ?? '';
	$novo['bairro']=$_POST['bairro'] ?? '';
	$novo['cidade']=$_POST['cidade'] ?? '';
	$novo['uf']=$_POST['uf'] ?? '';
	$novo['cep']=$_POST['cep'] ?? '';
	$tabela[intval($_POST['atu'])]=$novo; // substitui o registro antigo pelo novo
 /* em ultimo caso, estando presente os dados, realiza a inclusão */	
 } else if(isset($_POST['logradouro']) && $_POST['logradouro']!=""){
	 
	$novo = [];
	$novo['logradouro']=$_POST['logradouro'];
	$novo['numero']=$_POST['numero'] ?? '';
	$novo['bairro']=$_POST['bairro'] ?? '';
	$novo['cidade']=$_POST['cidade'] ?? '';
	$novo['uf']=$_POST['uf'] ?? '';
	$novo['cep']=$_POST['cep'] ?? '';
	/* note que aqui não há indicação de indice, oq indica inclusão */
	$tabela[]=$novo;
 }
 
 

 
?>
<html>
<head>
	<!-- Inclui o bootstrap para melhorar a interface -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script>
	    /* criação das variaveis que receberão os manipuladores dos inputs */
		var bt,exc,car;
		
		/* carrega os manipuladores dos inputs. deve ser executado após a montagem da tela pelo navegador (onload de body) */
		function inicializar(){
			
			bt = document.querySelector("[type=submit]"); // usamos a propriedade type=submit pois soh teremos um botão salvar 		
			exc = document.querySelector("[name=exc]");		
			car = document.querySelector("[name=car]");		

			document.querySelector("[name=logradouro]").focus();	

		}
		
		/* atribuimos o indice a exc e enviamos para o php remover esse elemento do array */
		function excluir(i){
			exc.value=i;
			bt.click(); // simulamos aqui o clicar do botao submit
		}
		
		function carregar(i){
			car.value=i;
			bt.click();
		}
		
		/* acha todos os inputs com classe clear e limpa o value */		
		function limpar(){
			let inpts = document.querySelectorAll(".clear");
			inpts.forEach((e)=>e.value="");
			document.querySelector("[name=logradouro]").focus();	
		}
		
	</script>
	<style>
		input.clear{
			display: block;
			margin-bottom: 3px;
		}
		form{
			padding-left:3px;
			padding-top:3px;
		}
		input[name=numero]{
			width:5em;
		}
		input[name=uf]{
			width:2em;
		}
		input[name=logradouro],input[name=bairro],input[name=cidade	]{
			width:30em;
		}
		input[name=logradouro],input[name=numero],input[name=cidade],input[name=uf] {
			display: inline-block;
		}
		input[type=submit]{
			background-color: LightGreen;
		}
		input[type=button]{
			background-color: AliceBlue;
		}
	</style>
</head>
<body onload="inicializar()">
	<!-- Formulario usado para enviar os dados coletados para aula5.php usando POST (sem transparencia na url) -->
	<form action="aula5" method="POST">
		<h3>Cadastro de Endereços </h3>
		<input type="hidden" name="exc" />
		<input type="hidden" name="car" />
		
		<!-- se existir a variavel atu uso ela para popular o valor inicial do input -->
		<input class="clear" type="hidden" name="atu" value="<?=$atu ?? ''?>" />
		
		<!-- realizamos a serialização do array tabela e em seguida transformamos os caracteres indesejaveis em codigos html -->
		<input type="hidden" name="tabela" value="<?=htmlspecialchars(serialize($tabela))?>" />
		
		<!-- se existir a variavel logradouro,numero etc uso ela para popular o valor inicial do seu input -->
		<input class="clear" placeholder="Logradouro:" name="logradouro" value="<?=$logradouro ?? '' ?>" />
		<input class="clear" placeholder="Numero:" name="numero" value="<?=$numero ?? '' ?>" />
		<input class="clear" placeholder="Bairro:" name="bairro" value="<?=$bairro ?? '' ?>" />
		<input class="clear" placeholder="Cidade:" name="cidade"  value="<?=$cidade ?? '' ?>"/>
		<input class="clear" placeholder="UF:" name="uf" value="<?=$uf ?? '' ?>" />
		<input class="clear" placeholder="CEP:" name="cep" value="<?=$cep ?? '' ?>" />
		<input type="submit" value="Salvar" />
		<input type="button" value="Limpar"  onclick="limpar()"/>
	</form>
	<table class="table table-striped table-bordered m-2">
		<thead>
			<th>Logradouro</th>
			<th>Número</th>
			<th>Cidade</th>
			<th>Opções</th>
		</thead>
		<tbody>
			<?php 
			/* Uma tabela é formada por varias linhas/tr. Foreach vai criar uma tr para cada linha da tabela  
			   $i assume o indice do array 0,1,2... ,já $e assume o valor do elemento, nesse caso um array com os dados da linha da tabela */
			foreach($tabela as $i=>$e){  ?>
			<tr>
				<!-- ao clicar na celula, chama a função carregar passando o indice do vetor -->
				<td onclick="carregar(<?=$i?>)" ><?=$e['logradouro']?></td>
				<td onclick="carregar(<?=$i?>)"><?=$e['numero']?></td>
				<td onclick="carregar(<?=$i?>)"><?=$e['cidade']?></td>
				<td>
				    <!-- ao clicar no botão, chama a função excluir passando o indice do vetor -->
					<button type="button" onclick="excluir(<?=$i?>)">
						X
					</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<!-- script usado pelo bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
