<?php
require_once("lib/funcoes.php");



function php_excluir($id)
{
		$conexao  = conexao();
		$sql      = "delete from aluno2 where a_id=$id";
		mysql_query($sql,$conexao);
		$x = "Grupo excluido !";
		return $x;
}
function nome_curso($cur_id)
{
	$con = conexao();
	$sql = "select * from curso where cur_id=$cur_id";
	$res = mysql_query($sql,$con);
	$lin = mysql_fetch_array($res);
	$nom = $lin["cur_nome"];
	return $nom;
}

function nome_aluno($a_id)
{
	$con = conexao();
	$sql = "select * from aluno2 where a_id=$a_id";
	$res = mysql_query($sql,$con);
	$linha = mysql_fetch_array($res);
	//$nom = $linha["a_nome"];
	
	return $linha;
}



function php_gravar($a_id, $a_nome ,$a_apelido,$a_data,$a_cpf,$a_rg, $a_end,$a_bairro,$a_city,$a_cep,$a_fone,$a_cel, $a_mail,$cur_id,$a_senha,$tur_id,$arquivo)
{
	//echo "Variaveis ".$id." ".$a_nome;

		$conexao  = conexao();
		
		$codifica = sha1($a_senha);
		
 
$var=(substr($arquivo,11));
//substr($texto, 11

//$data=inverteData($a_data);

		if ($a_id=="")
		{
			$sql = "insert into aluno2 (a_nome,a_apelido,a_data,a_cpf,a_rg,
	a_end,a_bairro, a_city,a_cep,a_fone, a_cel,a_mail,cur_id,aux_s,tur_id,
	imagem) values ('$a_nome','$a_apelido','$a_data','$a_cpf','$a_rg','$a_end','$a_bairro', '$a_city','$a_cep','$a_fone', '$a_cel','$a_mail','$cur_id','$codifica','$tur_id','$var')";
			$x   = " Grupo gravado !";
		}
		else
		{
			$sql = "update aluno2 set a_nome='$a_nome',	a_apelido='$a_apelido',
			a_data='$a_data',a_cpf='$a_cpf', a_rg='$a_rg', a_end='$a_end',
			a_bairro='$a_bairro',a_city='$a_city',a_cep='$a_cep',a_fone='$a_fone',a_cel='$a_cel',
			a_mail='$a_mail', cur_id = '$cur_id', aux_s='$codifica', tur_id='$tur_id' where a_id='$a_id'";
			$x   = " Grupo alterado !";
		}
		mysql_query($sql,$conexao);		
		return $x;
		
}

require_once("Sajax.php");
sajax_init();
sajax_export("php_excluir","php_gravar","nome_curso","nome_aluno");
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
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
		<title>Carômetro - FIB - Cadastro Aluno</title> <!--Titulo da página -->
</head>
<script>
	<?php
	sajax_show_javascript();
	?>
	function mostra( x )
	{
		alert( x );
		document.este.submit();
	}
	function excluir(id)
	{
		var decisao = confirm("Excluir Grupo ?");
		if (decisao)
		{
			x_php_excluir( id , mostra );
		}				
	}	

	function gravar()
	{

		var a_id   = document.getElementById("a_id").value;
		alert(a_id);
		var a_nome2 = document.getElementById("a_nome").value;
		alert(a_nome2);
		var a_end = document.getElementById("a_end").value;
		alert(a_end);
		var a_city = document.getElementById("a_city").value;
		alert(a_city);
		var a_bairro = document.getElementById("a_bairro").value;
		alert(a_bairro);
		var a_cep = document.getElementById("a_cep").value;
		alert(a_cep);
		var a_fone   = document.getElementById("a_fone").value;
		alert(a_fone);
		var a_mail   = document.getElementById("a_mail").value;
		alert(a_mail);
		var cur_id2   = document.getElementById("cur_id2").value;
		alert(cur_id2);
		var a_senha	= document.getElementById("a_senha").value;
		alert(a_senha);
		var a_apelido = document.getElementById("a_apelido").value;
		alert(a_apelido);
		var a_data = document.getElementById("a_data").value;
		alert(a_data);
		var a_cpf = document.getElementById("a_cpf").value;

		var a_rg = document.getElementById("a_rg").value;
		alert(a_rg);
		var a_cel = document.getElementById("a_cel").value;
		alert(a_cel);
		var tur_id = document.getElementById("tur_id").value;
	alert(tur_id);
		var imagem = document.getElementById("arquivo").value;
	 	

		x_php_gravar(a_id, a_nome2 ,a_apelido,a_data,a_cpf,a_rg, a_end,a_bairro, a_city,a_cep,a_fone,a_cel, a_mail,cur_id2,a_senha,tur_id,imagem,mostra );
		
		
		document.getElementById("a_nome").value = "";
		document.getElementById("a_end").value = "";
		document.getElementById("a_city").value = "";
		document.getElementById("a_bairro").value = "";
		document.getElementById("a_cep").value = "";
		document.getElementById("a_fone").value = "";
		document.getElementById("a_mail").value = "";	
		document.getElementById("a_senha").value="";
		document.getElementById("a_cel").value = "";
		document.getElementById("a_rg").value = "";
		document.getElementById("a_cpf").value = "";
		document.getElementById("a_apelido").value = "";
			
		document.getElementById("cur_id2").value = "";
		//document.getElementById("cur_nome2").value = "";
	
}
	function alterar( id,a_nome,a_end,a_city,a_bairro,a_cep,a_fone,a_mail,cur_id,cur_nome,a_senha)
	{
		document.getElementById("a_id").value   	= id;
		document.getElementById("a_nome").value 	= a_nome;
		document.getElementById("a_end").value 		= a_end;
		document.getElementById("a_city").value 	= a_city;
		document.getElementById("a_bairro").value	= a_bairro;
		document.getElementById("a_cep").value 		= a_cep;
		document.getElementById("a_fone").value 	= a_fone;
		document.getElementById("a_mail").value 	= a_mail;
		document.getElementById("a_apelido").value 	= a_apelido;
		document.getElementById("a_rg").value 		= a_rg;
		document.getElementById("a_cpf").value 		= a_cpf;
		document.getElementById("a_senha").value 	= a_senha;
		document.getElementById("a_cel").value 		= a_cel;
		//document.getElementById("a_senha").value  = a_senha;
		document.getElementById("cur_id2").value 	= cur_id;
		//document.getElementById("a_senha").value  = a_senha;
		document.getElementById("cur_nome2").value 	= cur_nome;
	//	document.getElementById("a_senha").value    = a_senha;
		
		
		//x_php_gravar(id, nome, endereco, cidade, bairro, cep, fone, email, mostra );
	}

	function mostra_nome(nome_do_curso)
	{
		//
		document.getElementById('cur_nome2').value = nome_do_curso;
	}
	function pesquisa_curso(id)
	{
		// chama a função PHP através do SAJAX
		id = document.getElementById('cur_id2').value;
		//alert(id);
		x_nome_curso(id , mostra_nome );
	}
			function mostra_nomea(nome_do_aluno)
	{
		
		alert(nome_do_aluno);
		document.getElementById('a_nome').value = nome_do_aluno["a_nome"];
		document.getElementById('a_apelido').value = nome_do_aluno["a_apelido"];
		document.getElementById('a_data').value = nome_do_aluno["a_data"];
		document.getElementById('a_cpf').value = nome_do_aluno["a_cpf"];
		document.getElementById('a_rg').value = nome_do_aluno["a_rg"];
		document.getElementById('a_end').value = nome_do_aluno["a_end"];
		document.getElementById('a_bairro').value = nome_do_aluno["a_bairro"];
		document.getElementById('a_city').value = nome_do_aluno["a_city"];
		document.getElementById('a_cep').value = nome_do_aluno["a_cep"];
		document.getElementById('a_fone').value = nome_do_aluno["a_fone"];
		document.getElementById('a_cel').value = nome_do_aluno["a_cel"];
		document.getElementById('a_mail').value = nome_do_aluno["a_mail"];
		document.getElementById('a_senha').value = nome_do_aluno["aux_s"];
		document.getElementById('cur_id2').value = nome_do_aluno["cur_id"];
		document.getElementById('tur_id').value = nome_do_aluno["tur_id"];
		//document.getElementById('a_nome').value = nome_do_aluno["a_nome"];
		//document.getElementById('a_apelido').value=;
		
	}
function pesquisa_aluno(id)
	{
		// chama a função PHP através do SAJAX
		id = document.getElementById('a_id').value;
		alert(id);
		alert(mostra_nomea);
		x_nome_aluno(id , mostra_nomea );
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

$query = mysql_query("SELECT cur_id, cur_nome FROM curso");
$sql = mysql_query("select turma.t_id, turma.t_ano,turma.c_id,curso.cur_nome FROM turma LEFT JOIN 
	curso ON turma.c_id=curso.cur_id ORDER BY turma.t_id");


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
      	<form class="form-horizontal" action="cadastroaluno.php" name="este" method="POST" enctype="multipart/form-data">
		    <fieldset>
		    	<legend> Cadastro Aluno </legend>

		    	<div class="control-group">
					<label class="control-label" for="fotoaluno">Selecione uma foto</label>
					<div class="controls">
		    			<input type="file" class="input-large" maxlength="100" id="arquivo" name="arquivo">
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="raaluno">RA/Login</label>
		    		<div class="controls">
						<input type="text" class="input-large" id="a_id"  onchange = "javascript: pesquisa_aluno()" maxlength="20" placeholder="RA" required autofocus>
						
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="nomealuno">NOME</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_nome" maxlength="200" placeholder="NOME">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="apelidoaluno">APELIDO</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_apelido" maxlength="100" placeholder="APELIDO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="datanascaluno">DATA DE NASCIMENTO</label>
					<div class="controls">
						<input type="date" class="input-large" id="a_data" placeholder="DATA DE NASCIMENTO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cpfaluno">CPF</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_cpf" maxlength="30" placeholder="CPF">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="rgaluno">RG</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_rg" maxlength="30" placeholder="RG">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="enderecoaluno">ENDEREÇO</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_end" maxlength="250" placeholder="ENDEREÇO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="bairroaluno">BAIRRO</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_bairro" maxlength="50" placeholder="BAIRRO">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cidadealuno">CIDADE</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_city" maxlength="50" placeholder="CIDADE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="cepaluno">CEP</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_cep" maxlength="80" placeholder="CEP">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="telefonealuno">TELEFONE</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_fone" maxlength="30" placeholder="TELEFONE">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="celularaluno">CELULAR</label>
					<div class="controls">
						<input type="text" class="input-large" id="a_cel" maxlength="30" placeholder="CELULAR">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emailaluno">E-MAIL</label>
					<div class="controls">
						<input type="email" class="input-large" id="a_mail" maxlength="100" placeholder="E-MAIL">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="senha">SENHA</label>
					<div class="controls">
						<input type="password" class="input-large" id="a_senha" maxlength="100" placeholder="SENHA">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selecionecursoaluno">CURSO</label>
					<div class="controls">
						<select class="form-control" id="cur_id2" name="cur_id2">
					      <option>Selecione um Curso</option>
<?php while($curso = mysql_fetch_array($query)) { ?>
 <option value="<?php echo $curso['cur_id'] ?>"><?php echo $curso['cur_nome'] ?></option>
 <?php } ?>
						  </select>	
			    	</div>
			    </div>
			    <div class="control-group">
					<label class="control-label" for="selecioneturmaaluno">TURMA</label>
					<select class="form-control" id="tur_id">
					      <option>Selecione uma Turma</option>
			<?php while($turma = mysql_fetch_array($sql)) { ?>
 <option value="<?php echo $turma['t_id'] ?>"><?php echo $turma['t_ano']; echo " - "?><?php echo  $turma['c_id'] ?></option>
 <?php } ?>
			   		 </select>
			</fieldset><!-- Deverá puxar as turmas de cada curso, após selecionar o curso -->

			<div id="button">        
		      <button class="btn btn-primary" type="submit"  onclick="javascript: document.este.submit(),gravar();"  >Salvar</button>
		      
		      <button class="btn btn-secondary" type="button" value="GRAVAR">Cancelar</button>
		    </div>
		    <br><br>
		</form>
	  </div>
	  
    </div>
    
    <!--<input type="submit" value="Gravar" onclick="javascript: document.este.submit(),gravar();"> -->
</body>


	