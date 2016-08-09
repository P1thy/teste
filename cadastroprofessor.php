<?php
require_once("lib/funcoes.php");




function nome_professor($p_id)
{
	$con = conexao();
	$sql = "select * from professor where p_id=$p_id";
	$res = mysql_query($sql,$con);
	$linha = mysql_fetch_array($res);
	//$nom = $linha["p_nome"];
	
	return $linha;
}



function php_gravar($p_id, $p_nome ,$p_apelido,$p_data,$p_cpf,$p_rg, $p_end,$p_bairro,$p_city,$p_cep,$p_fone,$p_cel, $p_mail,$p_form,$p_senha,$p_tit,$arquivo)
{
	//echo "Variaveis ".$id." ".$p_nome;

		$conexao  = conexao();
		
		$codifica = sha1($p_senha);
		
 
$var=(substr($arquivo,11));
//substr($texto, 11

//$data=inverteData($p_data);

		if ($p_id=="")
		{
			$sql = "insert into professor (p_nome,p_apelido,p_data,p_cpf,p_rg,
	p_end,p_bairro, p_city,p_cep,p_fone, p_cel,p_mail,p_form,aux_s,p_tit,
	imagem) values ('$p_nome','$p_apelido','$p_data','$p_cpf','$p_rg','$p_end','$p_bairro', '$p_city','$p_cep','$p_fone', '$p_cel','$p_mail','$p_form','$codifica','$p_tit','$var')";
			$x   = " Grupo gravado !";
		}
		else
		{
			$sql = "update professor set p_nome='$p_nome',	p_apelido='$p_apelido',
			p_data='$p_data',p_cpf='$p_cpf', p_rg='$p_rg', p_end='$p_end',
			p_bairro='$p_bairro',p_city='$p_city',p_cep='$p_cep',p_fone='$p_fone',p_cel='$p_cel',
			p_mail='$p_mail', p_form = '$p_form', aux_s='$codifica', p_tit='$p_tit' where p_id='$p_id'";
			$x   = " Grupo alterado !";
		}
		mysql_query($sql,$conexao);		
		return $x;
		
}

require_once("Sajax.php");
sajax_init();
sajax_export("php_gravar","nome_professor");
sajax_handle_client_request();
?>

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
		<title>Carômetro - FIB - Cadastro Professor(a)</title> <!--Titulo da página -->
</head>

<script>
	<?php
	sajax_show_javascript();
	?>
	function mostra( x )
	{
		alert( x );
		document.este2.submit();
	}

	function gravar()
	{

		var p_id   = document.getElementById("p_id").value;
		alert(p_id);
		var p_nome2 = document.getElementById("p_nome").value;
		alert(p_nome2);
		var p_end = document.getElementById("p_end").value;
		alert(p_end);
		var p_city = document.getElementById("p_city").value;
		alert(p_city);
		var p_bairro = document.getElementById("p_bairro").value;
		alert(p_bairro);
		var p_cep = document.getElementById("p_cep").value;
		alert(p_cep);
		var p_fone   = document.getElementById("p_fone").value;
		alert(p_fone);
		var p_mail   = document.getElementById("p_mail").value;
		alert(p_mail);
		var p_form   = document.getElementById("p_form").value;
		alert(p_form);
		var p_senha	= document.getElementById("p_senha").value;
		alert(p_senha);
		var p_apelido = document.getElementById("p_apelido").value;
		alert(p_apelido);
		var p_data = document.getElementById("p_data").value;
		alert(p_data);
		var p_cpf = document.getElementById("p_cpf").value;
alert(p_cpf);
		var p_rg = document.getElementById("p_rg").value;
		alert(p_rg);
		var p_cel = document.getElementById("p_cel").value;
		alert(p_cel);
		var p_tit = document.getElementById("p_tit").value;
	alert(p_tit);
		var imagem = document.getElementById("arquivo").value;
	 	alert(imagem);

		x_php_gravar(p_id, p_nome2 ,p_apelido,p_data,p_cpf,p_rg, p_end,p_bairro, p_city, p_cep, p_fone, p_cel, p_mail,p_form,p_senha,p_tit,imagem,mostra );
		
		
		document.getElementById("p_nome").value = "";
		document.getElementById("p_end").value = "";
		document.getElementById("p_city").value = "";
		document.getElementById("p_bairro").value = "";
		document.getElementById("p_cep").value = "";
		document.getElementById("p_fone").value = "";
		document.getElementById("p_mail").value = "";	
		document.getElementById("p_senha").value="";
		document.getElementById("p_cel").value = "";
		document.getElementById("p_rg").value = "";
		document.getElementById("p_cpf").value = "";
		document.getElementById("p_apelido").value = "";
			
		document.getElementById("p_form").value = "";
		//document.getElementById("cur_nome2").value = "";
	
}


	
			function mostra_nomea(nome_do_professor)
	{
		
		alert(nome_do_professor);
		document.getElementById('p_nome').value = nome_do_professor["p_nome"];
		document.getElementById('p_apelido').value = nome_do_professor["p_apelido"];
		document.getElementById('p_data').value = nome_do_professor["p_data"];
		document.getElementById('p_cpf').value = nome_do_professor["p_cpf"];
		document.getElementById('p_rg').value = nome_do_professor["p_rg"];
		document.getElementById('p_end').value = nome_do_professor["p_end"];
		document.getElementById('p_bairro').value = nome_do_professor["p_bairro"];
		document.getElementById('p_city').value = nome_do_professor["p_city"];
		document.getElementById('p_cep').value = nome_do_professor["p_cep"];
		document.getElementById('p_fone').value = nome_do_professor["p_fone"];
		document.getElementById('p_cel').value = nome_do_professor["p_cel"];
		document.getElementById('p_mail').value = nome_do_professor["p_mail"];
		document.getElementById('p_senha').value = nome_do_professor["aux_s"];
		document.getElementById('p_form').value = nome_do_professor["p_form"];
		document.getElementById('p_tit').value = nome_do_professor["p_tit"];
		//document.getElementById('p_nome').value = nome_professor["p_nome"];
		//document.getElementById('p_apelido').value=;
		
	}
function pesquisa_professor(id)
	{
		// chama a função PHP através do SAJAX
		id = document.getElementById('p_id').value;
		alert(id);
		alert(mostra_nomea);
		x_nome_professor(id , mostra_nomea );
	}


</script>

<?php
$conexao  = conexao();


if( $_FILES ) { // Verificando se existe o envio de arquivos.
	
	if( $_FILES['arquivo'] ) { // Verifica se o campo não está vazio.
		
		$dir = './arquivos/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o arquivo temporário.
		$name = $_FILES['arquivo']['name']; // Recebe o nome do arquivo.
		


		// move_uploaded_file( $arqTemporário, $nomeDoArquivo )
		if( move_uploaded_file( $tmpName, $dir . $name ) ) { // move_uploaded_file irá realizar o envio do arquivo.		
		//	header('Location: sucesso.php'); // Em caso de sucesso, retorna para a página de sucesso.			
		} else {			
		//	header('Location: erro.php'); // Em caso de erro, retorna para a página de erro.			
		}
		
	}

}



//$sql = "select * from curso;";
			  


?>


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
      	<form class="form-horizontal" action="cadastroprofessor.php"  name="este2" method="post" enctype="multipart/form-data">
		    <fieldset>
		    	<legend> Cadastro Professor(a) </legend>

		    	<div class="control-group">
					<label class="control-label" for="fotoprofessor">Selecione uma foto</label>
					<div class="controls">
		    			<input type="file" class="input-large" maxlength="100" id="arquivo" name="arquivo">
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="rapprofessor">RAP/Login</label>
		    		<div class="controls">
						<input type="text" class="input-large" id="p_id"  onchange = "javascript: pesquisa_professor()" maxlength="20" placeholder="RAP" required autofocus>
							
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="nomeprofessor">NOME</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_nome" maxlength="200" placeholder="NOME">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="apelidoprofessor">APELIDO</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_apelido" maxlength="100" placeholder="APELIDO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="datanascprofessor">DATA DE NASCIMENTO</label>
					<div class="controls">
						<input type="date" class="input-large" id="p_data" placeholder="DATA DE NASCIMENTO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cpfprofessor">CPF</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_cpf" maxlength="30" placeholder="CPF">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="rgprofessor">RG</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_rg" maxlength="30" placeholder="RG">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="enderecoprofessor">ENDEREÇO</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_end" maxlength="250" placeholder="ENDEREÇO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="bairroprofessor">BAIRRO</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_bairro" maxlength="50" placeholder="BAIRRO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cidadeprofessor">CIDADE</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_city" maxlength="50" placeholder="CIDADE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cepprofessor">CEP</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_cep" maxlength="80" placeholder="CEP">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="telefoneprofessor">TELEFONE</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_fone" maxlength="30" placeholder="TELEFONE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="celularprofessor">CELULAR</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_cel" maxlength="30" placeholder="CELULAR">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emailprofessor">E-MAIL</label>
					<div class="controls">
						<input type="email" class="input-large" id="p_mail" maxlength="100" placeholder="E-MAIL">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tituloprofessor">TÍTULO PROFESSOR(A)</label>
					<div class="controls">
						<input type="text" class="input-large" id="p_tit" maxlength="40" placeholder="TÍTULO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="formacaoprofessor">FORMAÇÃO</label>
					<div class="controls">
						<textarea rows="10" cols="40"  class="input-large" id="p_form" maxlength="500" placeholder="FORMAÇÃO"></textarea>
					</div>
				</div>
			<div class="control-group">
					<label class="control-label" for="senha">SENHA</label>
					<div class="controls">
						<input type="password" class="input-large" id="p_senha" maxlength="40" placeholder="SENHA">
					</div>
				</div>
				<br />
			
			</fieldset>

			<div id="button">        
			      <button class="btn btn-primary" type="submit"  onclick="javascript: document.este2.submit(),gravar();"  >Salvar</button>
		      <button class="btn btn-secondary" type="submit">Cancelar</button>
		    </div>
		    <br><br>
		</form>
	  </div>
	  
    </div>
</body>
</html>