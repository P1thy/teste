<?php

require_once("lib/funcoes.php");





$conexao  = conexao();

if (isset($_REQUEST["pesquisa"]))
{

	$pesquisa = $_REQUEST["pesquisa"];

}

else

{

	$pesquisa = "";

}

if ($pesquisa == "")
{

		$sql = "select turma.t_id,turma.t_ano,turma.c_id,curso.cur_id,curso.cur_nome FROM turma LEFT JOIN 
	curso ON turma.c_id=curso.cur_id";

}

else

{

$sql="select turma.t_id,turma.t_ano,turma.c_id,curso.cur_id,curso.cur_nome FROM turma LEFT JOIN 
	curso ON turma.c_id=curso.cur_id where curso.cur_nome like '%$pesquisa%'";
			//order by curso.cur_nome";
}

$resultado = mysql_query( $sql , $conexao ) or die("Erro SQL" . $sql );



function php_excluir($id)
{
		$conexao  = conexao();
		$sql      = "delete from aluno2 where a_id=$id";
		mysql_query($sql,$conexao);
		$x = "Grupo excluido !";
		return $x;
}


function php_aluno($t_id)
{

	$con = conexao();
	//$res = "";
	
$sqll = "select aluno2.a_id,aluno2.a_nome, aluno2.a_fone, aluno2.a_mail, aluno2.imagem from aluno2 where tur_id= $t_id";
$res = mysql_query($sqll,$con);
	//$linhas = mysql_fetch_array($res);
	
	//$res = mysql_query($sqll,$con);
	//$lin = mysql_fetch_array($res);
	//echo "fdppp";
	//$nom = $lin["cur_nome"];

	//$res = mysql_query( $sqll , $conexao ) or die("Erro SQL" . $sqll);
	//while ($linha=mysql_fetch_array($res))
	//{
	//$x   = " Grupo alterado !";
		

	//echo "teste bem graande";
	//echo '<script type="text/javascript"> document.getElementById(\"txtresposta\").value = teste ; </script>';

	//}



$teste = "";
$teste= "<center><table border='1'><tr><td>Nome &nbsp;</td><td>Telefone &nbsp;</td><td>Foto &nbsp;</td></tr>";

 while ($linhas=mysql_fetch_array($res)){ 

 	$teste .="<tr><td>".$linhas["a_nome"]." &nbsp; </td><td>".$linhas["a_fone"]." &nbsp;  </td> <td> <img src='/magrathea/arquivos/".$linhas["imagem"]."'height=\"60\" width=\"60\"></td><td>
				<input type=\"button\" value=\"X\" onclick=\"excluir('".$linhas["a_id"]."');\" ></td>	</tr>" ;
	//	i++;
	}
	$teste.="</table></center>";

return $teste;	
}
?>
<?php
/*
if (isset($_REQUEST["t_id"]))
{
	$t_id = $_REQUEST["t_id"];
}
else
{
	$t_id = "";
}

$sqll="";

if ($t_id != "")
{

$sqll = "select aluno2.a_nome, aluno2.a_fone, aluno2.a_mail, aluno2.imagem from aluno2 ";		
}
else
{

$sqll = "select aluno2.a_nome, aluno2.a_fone, aluno2.a_mail, aluno2.imagem from aluno2 ";

}

*/
require_once("Sajax.php");

sajax_init();
sajax_export("php_aluno","php_excluir");
sajax_handle_client_request();


?>

<script>
<?php
sajax_show_javascript();
?>

function mostra( x ) 
	{
		alert( x );
		//document.getElementById("teste").value = lin['imagem'];
		document.estes2.submit();
	}
	
function mostra_nomea(nome_do_aluno)
	{
//	alert(nome_do_aluno);



	txtresposta.innerHTML = nome_do_aluno;

	/*
 while (nome_do_aluno[i]){ 
		txtresposta.innerHTML = "<center><table border='1'><tr><td>Nome &nbsp;</td><td>Telefone &nbsp;</td><td>Foto &nbsp;</td><tr><td>"+nome_do_aluno[i]  +"&nbsp;</td>"+
		"<td>"+nome_do_aluno[i] + i + j +"&nbsp;</td> " +
		"<td> <img src='/magrathea/arquivos/" +nome_do_aluno[i]+"'height=\"60\" width=\"60\"></td></tr></table></center>" ;
i++;
j++;
}*/
//j++;

		
		/*document.getElementById('txtresposta').value = nome_do_aluno["a_nome"];
		document.getElementById('txtresposta2').value = nome_do_aluno["a_fone"];
		document.getElementById('txtresposta3').value = nome_do_aluno["a_fone"];
*/

}

function excluir(id)
	{
		var decisao = confirm("Excluir Grupo ?");
		if (decisao)
		{
			x_php_excluir( id , mostra );
		}				
	}	

function alterar(t_id)
	{
		//t_id = document.getElementById('p_id').value;
		//alert(t_id);
		//document.getElementById("teste").value = t_id;
		x_php_aluno(t_id, mostra_nomea);
		//document.estes.submit();
		
	}

	
	</script>
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
		<title>Carômetro - FIB</title> <!--Titulo da página -->
</head>
<body>
	<form method="post" action="telacurso.php" name="estes2"> 
<div class="container">
	<header class="row">
    	<div id="cabe">
			<nav class="navbar navbar-default">
				<ul class="nav navbar-nav">
					<li class="dropdown">
	          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><font color="#fff" size="5"> HOME </font><span class="caret"></span></a>
	          			<ul class="dropdown-menu">
	            			<li><a href="#"><font color="#FF8C00" size="4">DISCIPLINAS</font></a></li>
	          			</ul>
	        		</li>
	        		<li><a href="#"><font color="#fff" size="5"> MUNDOFIB </font></a></li>
	        		<li><a href="#"><font color="#fff" size="5"> OPORTUNIDADES </font></a></li>
	        		<li><a href="#"><font color="#fff" size="5"> CURSOS </font></a></li>
	        		<li><a href="#"><font color="#fff" size="5"> PROFESSORES </font></a></li>
	        	</ul>
			</nav>
		</div>
	</header>
	<div class="container">
			<div class="row">
				<div id="conteudo" class="col-md-9">
					<h3> Digite um curso</h3>
					<div class="col-lg-6">
						<div class="input-group">
								<input type="text" id="pesquisacurso" class="form-control" maxlength="100" placeholder="Nome" required autofocus>				
	     					<span class="input-group-btn">
	        			<button class="btn btn-primary" type="submit" onclick="javascript: document.estes.submit();">Pesquisar</button>
	     				 	</span>
	     				</div>
	     			</div>
   					<div class="col-md-6">
   						<div class="colunm1" >

   						<?php
	while ($linha=mysql_fetch_array($resultado))
	{
		$id   = $linha["cur_id"];
		$nome = $linha["cur_nome"];		
		$ano  = $linha["t_ano"];	
		$t_id = $linha["t_id"];

		echo "ID: ".$linha["cur_id"]."&nbsp &nbsp &nbsp &nbsp";
	    //echo" - "; &nbsp
	    echo "CURSO: ".$linha["cur_nome"]."&nbsp &nbsp &nbsp &nbsp"; 
	  
		
		echo "ANO: <a href=\"javascript:alterar('".$t_id."');\">";
		 	echo $linha["t_ano"];?>
	</a>
		<br/>


<?php
				} ?>

		
<br/>


	<div id="txtresposta">
 
	</div>
      



</div>
       						<!--Ao realizar a pesquisa por curso, deverá mostrar todos os professores daquele curso. Com foto, Nome,  E-mail, Formação, Título na frente do nome. -->
       				</div>
				</div>
       			<div id="sidebar" class="col-md-3">
					<font color="#FF8C00" size="6">Feed Notícias</font><br>
					<font color="#FF8C00" size="6">Chat FIB</font>
				</div>		
			</div>
	</div>
</div>
</body>
</html>