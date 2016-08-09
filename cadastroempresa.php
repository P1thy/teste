<?php
require_once("lib/funcoes.php");




function nome_empresa($e_id)
{
	$con = conexao();
	$sql = "select * from empresa where e_id=$e_id";
	$res = mysql_query($sql,$con);
	$linha = mysql_fetch_array($res);
	//$nom = $linha["e_nome"];
	
	return $linha;
}



function php_gravar($e_id, $e_nome, $e_cnpj, $e_end, $e_bairro, $e_city, $e_cep, $e_fone, $e_cel, $e_mail, $e_senha, $e_contato)
{
	//echo "Variaveis ".$id." ".$e_nome;

		$conexao  = conexao();
		
		$codifica = sha1($e_senha);
		
 

		if ($e_id=="")
		{
			$sql = "insert into empresa(e_nome, e_cnpj, e_end, e_bairro, e_city, e_cep, e_fone, e_cel, e_mail, e_contato, aux_s) values ('$e_nome','$e_cnpj', 	'$e_end', '$e_bairro', '$e_city', '$e_cep', '$e_fone', '$e_cel', '$e_mail', '$e_contato', '$codifica')";
			$x   = " Grupo gravado !";
		}
		else
		{
			$sql = "update empresa set e_nome='$e_nome',e_cnpj='$e_cnpj',e_end='$e_end',
			e_bairro='$e_bairro',e_city='$e_city',e_cep='$e_cep',e_fone='$e_fone',e_cel='$e_cel', e_mail='$e_mail', e_contato = '$e_contato', aux_s='$codifica' where e_id='$e_id'";
			$x   = " Grupo alterado !";
		}
		mysql_query($sql,$conexao);		
		return $x;
		
}

require_once("Sajax.php");
sajax_init();
sajax_export("php_gravar","nome_empresa");
sajax_handle_client_request();
?>
<html>
	<head>
		<meta charset="UTF-8">
    <!--Nesse ponto faz-se todos os links com as pastas que contem os estilos utilizados pelo bootstrap, com pasta de javascript que é utilizado para a função de slideshow. -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/css.css">
    <script src="js/jquery-2.2.3.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/custom.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
		<title>Carômetro - FIB - Cadastro Empresa</title> <!--Titulo da página -->
</head>


<script>
	<?php
	sajax_show_javascript();
	?>
	function mostra( x )
	{
		alert( x );
		document.este3.submit();
	}

	function gravar()
	{

		var e_id   = document.getElementById("e_id").value;
		alert(e_id);
		var e_nome = document.getElementById("e_nome").value;
		alert(e_nome);
		var e_cnpj = document.getElementById("e_cnpj").value;
		alert(e_cnpj);
		var e_end = document.getElementById("e_end").value;
		alert(e_end);
		var e_bairro = document.getElementById("e_bairro").value;
		alert(e_bairro);
		var e_city = document.getElementById("e_city").value;
		alert(e_city);
		
		var e_cep = document.getElementById("e_cep").value;
		alert(e_cep);
		var e_fone   = document.getElementById("e_fone").value;
		alert(e_fone);

		var e_cel = document.getElementById("e_cel").value;
		alert(e_cel);
		var e_mail   = document.getElementById("e_mail").value;
		alert(e_mail);
		var e_senha	= document.getElementById("e_senha").value;
		alert(e_senha);

		var e_contato = document.getElementById("e_contato").value;
		alert(e_contato);
		

		x_php_gravar(e_id,e_nome,e_cnpj,e_end,e_bairro,e_city,e_cep,e_fone,e_cel,e_mail,e_senha,e_contato,mostra);
		
		
		document.getElementById("e_nome").value = "";
		document.getElementById("e_cnpj").value = "";
		document.getElementById("e_end").value = "";
		document.getElementById("e_city").value = "";
		document.getElementById("e_bairro").value = "";
		document.getElementById("e_cep").value = "";
		document.getElementById("e_fone").value = "";
		document.getElementById("e_mail").value = "";	
		document.getElementById("e_senha").value="";
		document.getElementById("e_cel").value = "";
		document.getElementById("e_contato").value = "";
		
		//document.getElementById("cur_nome2").value = "";
	
}


	
			function mostra_nomea(nome_do_empresa)
	{
		
		alert(nome_do_empresa);
		document.getElementById('e_nome').value = nome_do_empresa["e_nome"];
		document.getElementById('e_end').value = nome_do_empresa["e_end"];
		document.getElementById('e_bairro').value = nome_do_empresa["e_bairro"];
		document.getElementById('e_city').value = nome_do_empresa["e_city"];
		document.getElementById('e_cep').value = nome_do_empresa["e_cep"];
		document.getElementById('e_fone').value = nome_do_empresa["e_fone"];
		document.getElementById('e_cel').value = nome_do_empresa["e_cel"];
		document.getElementById('e_mail').value = nome_do_empresa["e_mail"];
		document.getElementById('e_senha').value = nome_do_empresa["aux_s"];
		document.getElementById('e_cnpj').value = nome_do_empresa["e_cnpj"];
		document.getElementById('e_contato').value = nome_do_empresa["e_contato"];
		//document.getElementById('e_nome').value = nome_professor["e_nome"];
		//document.getElementById('p_apelido').value=;
		
	}
function pesquisa_empresa(id)
	{
		// chama a função PHP através do SAJAX
		id = document.getElementById('e_id').value;
		alert(id);
		alert(mostra_nomea);
		x_nome_empresa(id , mostra_nomea);
	}


</script>


<body>
	<div class="container">
		<header class="row">
		    <div id="cabe"> <!--Cabeçalho -->
		     	<div id="logo"> 
		      		<a href="home.html"><img src="logo/logocarometro.png" alt="LogoCarometro" class="img-rounded"></a>
		  	  	</div>
		  	

  	  	</header>






	<div class="row">
      <div role="main">
      	<form class="form-horizontal" action="cadastroempresa.php"  name="este3" method="post" enctype="multipart/form-data">
		    <fieldset>
		    	<legend> Cadastro Empresa </legend>
	<div class="control-group">
		    		<label class="control-label" for="raeempresa">RAE</label>
		    		<div class="controls">
						<input type="text" class="input-large" id="e_id" onchange = "javascript: pesquisa_empresa()" maxlength="20" placeholder="RAE">
						
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="nomeempresa">NOME</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_nome" maxlength="200" placeholder="NOME">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cnpjempresa">CNPJ</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_cnpj" maxlength="30" placeholder="CNPJ">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="enderecoempresa">ENDEREÇO</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_end" maxlength="250" placeholder="ENDEREÇO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="bairroempresa">BAIRRO</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_bairro" maxlength="50" placeholder="BAIRRO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cidadeempresa">CIDADE</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_city" maxlength="50" placeholder="CIDADE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cepempresa">CEP</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_cep" maxlength="80" placeholder="CEP">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="telefoneempresa">TELEFONE</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_fone" maxlength="30" placeholder="TELEFONE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="celularempresa">CELULAR</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_cel" maxlength="30" placeholder="CELULAR">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emailempresa">E-MAIL</label>
					<div class="controls">
						<input type="email" class="input-large" id="e_mail" maxlength="100" placeholder="E-MAIL">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="contatoempresa">CONTATO</label>
					<div class="controls">
						<input type="text" class="input-large" id="e_contato" maxlength="100" placeholder="CONTATO">
					</div>
				</div>

		<div class="control-group">
					<label class="control-label" for="contatoempresa">CONTATO</label>
					<div class="controls">
						<input type="password" class="input-large" id="e_senha" maxlength="100" placeholder="SENHA">
					</div>
				</div>

			</fieldset><br><br>

			<div id="button">        
		      	      <button class="btn btn-primary" type="submit"  onclick="javascript: gravar();"  >Salvar</button>
		      <button class="btn btn-secondary" type="submit">Cancelar</button>
		    </div>
		    <br><br>
		</form>
	  </div>
	  
    </div>
</body>
