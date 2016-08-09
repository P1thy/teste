
<?php
$host = "localhost";
$user = "root";
$pass ="";
$banco = "fib";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());


@$usuario=$_POST['usuario'];
@$senha=$_POST['senha'];

@$dues=null;
 
$sql= mysql_query("SELECT * FROM login WHERE usuario='$usuario' and senha='$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if( isset($_POST["loga"])){
if($usuario == null && $senha == null)
{
	@$dues = "Digite usuario e senha!";
}
else if($row > 0 ){
	session_start();
	$_SESSION['usuario'] = $_POST['usuario'];
	$SESSION['senha'] = $_POST['senha'];
	
}
else{
	
	@$dues = "Usuario ou senha invalidos !";
	
}

}

?>



<html>


	<style type="css">
table { 
background-color: #B0E0E6; 
font: 12px verdana, arial, helvetica, sans-serif;
color:#003399;
border:2px solid #000099;
}
</style>
<table border="4" align = "center" background="blue">
<form name="login" method="post">

<br><br><br><br><br>
<tr>
	<td WIDTH=800 height=300 align="center" >
  <div class="control-group">

    <label class="control-label" for="inputEmail">Usuario</label>
    
      &nbsp;&nbsp;<input type="text" name="usuario" placeholder="Digite o seu usuario..." />
    
  </div>
  <br><br>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Senha</label>
    
     &nbsp;&nbsp; <input type="password" name="senha" placeholder="Digite a sua senha..." />
    
  </div>
  <div class="control-group">
    <div class="controls">
	<br><br>
       
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Login" name="loga"> 
	 
								
	  
    </div>
  </div>
  </form>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1><a href="CadastroUSER.php"><input type = "button" value = "Cadastro de conta"></a></h1>
		
		
						<label for="User"><?php
							if(isset($_POST["loga"])){ 
							echo @$dues; 
							}
							?></label>
						
		
							
		
		
		</tr>
		</td>


</table>


</html>




