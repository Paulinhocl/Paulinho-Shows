<style>
body{
        background-color: #000;
    }
    .container_form {
    width: 100%;
    margin: auto;
    display: flex;
    flex-direction: column;
    background-color:rgba(100,107,153,0.47); 
    box-shadow: 1px 0px 1.2px 0px #e3e3e3; 
    border-radius:3px; 
    padding:1em;
}
.container_form h1 {
    
    font-family:'open_sansregular';
    font-size: 2.3em;
    color: #00dae0;
    border-bottom: 1px #f0eded solid;
    margin-bottom: 10px;
    padding-bottom: 10px;
}
.form_grupo {
    width: 90%;
    margin: 0 auto;
    margin-bottom: 30px;
    position: relative;
}
.form_grupo .legenda { 
    width: 100%;
    float: left;
    margin-top: 15px;
    margin-bottom: 15px;
    font-weight: bold;
}
/* SUBMIT */
.submit { width:100%; float:left; }
.submit_btn {
    float: left;
    display: block;
    padding: 5px 30px;
    border: none;
    outline: none;
    background-color: #6fcffb;
    color: #fff;
    text-shadow: 0 0 5px rgb(0, 0, 0);
    font-family: inherit;
    font-size: 25px;
    font-family:'open_sansregular';
    border-radius: 6px;
    margin: 20px auto;
    cursor: pointer;
    transition: all 0.3s;
}
.submit_btn:hover {
    background-color: #444444;
    transform: scale(1.03);
}
.dropdown {
    display: block;
    margin: 0 auto;
    font-size: 16px;
    font-family: inherit;
    color: #222222;
    border-radius: 4px;
    border: 1px #f2f2f2 solid;
    background: #fdfdfd;
    outline: none;
    padding-left: 10px;
    width: 100%;
}
.form_new_input {
    display: none;
}
.radio_label,
.check_label {
    float: left;
    width: 100%;
    padding-left: 30px;
    cursor: pointer;
    margin-bottom: 8px;
}
.radio_new_btn {
    position: absolute;
    left: 0;
    transform: translateY(3px);
    height: 20px;
    width: 20px;
    border-radius: 50%;
    border: 0.2em solid #4c4c4c;
}
.radio_new_btn::after {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #6fcffb;
    visibility: hidden;
}
.check_new_btn {
    position: absolute;
    left: 0;
    height: 20px;
    width: 20px;
    border: 0.2em solid #4c4c4c;
}
.check_new_btn::after {
    content: "";
    height: 8px;
    width: 8px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #6fcffb;
    visibility: hidden;
}

.form_grupo {
    width: 100%;
    margin-bottom: 20px;
    position: relative;
}
.form_input {
    font-size: 16px;
    font-family: inherit;
    padding: 8px 15px;
    border-radius: 4px;
    border: 1px #f2f2f2 solid;
    background: #fdfdfd;
    outline: none;
    width: 70%;
    transition: all 0.3s;
}

</style>
<?php require_once("Connections/ConnectDB.php"); 




?>

<?php if(isset($_POST['submit']) && $_POST['submit'] == 'cadastrar'){
    

$nome = $_POST['nome'];
$estado = $_POST['estados'];
$cidade = $_POST['cidades'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$senha = $_POST['chave'];
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$hora = date('d/m/Y H:i');

if (empty($email)){
$msg = "informe seu email";

}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$msg = "Informe um email válido";

}

$verifica = "SELECT * FROM usuarios WHERE `email` = '$email'";
$contar = $ConnectDB->query($verifica);
$linha = $contar -> fetch_assoc();
$codigo = $linha["id_usuarios"];

if ($linha["email"] === $email){
$msg = "Esse email já foi cadastrado em nosso Sistema";
}else if ($linha["email"] !== $email){
$cadastra = "INSERT INTO usuarios (nome, estado, cidade, foto_perfil, data_user, email, tel, senha, verifica) VALUES ('$nome','$estado','$cidade',NULL,'$data','$email','$telefone','$senha','0')";

//$codigo = $linha["id_usuarios"];

if ($ConnectDB->query($cadastra) === true){
$msg = "cadastro com sucesso! e-mail de confirmação enviado";
header('Location:index.php');
}else{
$msg = "ERRO!";
}



$data = date('d/m/Y H:i');
$msn = "

Recebemos um pedido de cadastro do seu email em SexyTime!
<br />
Para confirmar seu cadastro, por favor clique no link abaixo.
<br />
<br />
<a href=\"http://www.classificados-mart.com.br/aadmin/confirma.php?email=$email&codigo=$codigo\">Confirmar Cadastro</a>
<br />
<br />
Se você não cadastrou este pedido em nosso site, por favor ignore este email!
<br />
Atenciosamente Equeipe SexyTime.
<br />
<br />
Enviado em: $data
";
$para = 'thiagojrjrjr@gmail.com';
$assunto = 'Nova Assinatura do SexyTime';

$headers = "From: $para\n";
$headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";

mail($email,$assunto,$msn,$headers);

}
}

//echo $linha["id_usuarios"];
?>
<!doctype html>
<html lang="pt_br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SexyTime</title>
<meta name="keywords" content="Site de Venda de Veiculos, venda de produtos usados, desapega martinopolis">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Site de Venda de Veiculos">
<meta name="autor" content="Thiago Jr">
<!--<link rel="stylesheet" href="css/style.css"> -->
<!--<meta http-equiv="refresh" content="0; url=manutencao.html" >-->

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> 
<!--[if IE]>
	 <script type="text/javascript">
		document.createElement("article");
		document.createElement("nav");
		document.createElement("details");
		document.createElement("figcaption");
		document.createElement("hgroup");
		document.createElement("section");
		document.createElement("header");
		document.createElement("aside");
		document.createElement("figure");
		document.createElement("menu");
		document.createElement("legend");
		document.createElement("hover");
		document.createElement("footer");
        document.createElement("main");
	</script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif] -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>


	<main style="text-align:center;">

	<div class="container_form">
    	 <br>
		 <div style="font-">
		<h2>Criar Conta</h2>
		</div>
        <div class="quebra"></div>
       
    	<article id="main_index">
            <div id="login_cadastro_direito">
            	<form action="#" method="POST" name="form" onSubmit="return validacao();">
					<div class="form_grupo">
						
                    	<input type="text" class="form_input" title="nome" id="nome" name="nome" tabindex="1" required placeholder="Nome"><br><br>
					</div>
                    <body onload="mods()">
                    Estado: <select id="estados" onchange ="rj.metodo1();sp.metodo1();mg.metodo1()">
                    <option></option>
                    </select>
                    Cidade: <select id="cidades">
                    <option></option>
                    </select>
                    </body>

<script type="text/javascript">
    
var estados = document.getElementById('estados')
var cidades = document.getElementById('cidades')
/*Método que cada objeto de estado chama quando selecionado no select 'estados'*/

var carregarSelects =function(){
    
    if (estados.value == this.nome) {
       
    for (var i = 0; i < this.cidades.length; i++){    
    var item = document.createElement('option')
    item.text = this.cidades[i]
    cidades.appendChild(item)
    }}}  
</script>
<!--Obejetos-->
<script type="text/javascript">

 
var arrayEstados = ['Rio de Janeiro','São paulo','Minas Gerais']


var rj = {  
nome: 'Rio de Janeiro',
cidades: ['Belford Roxo','São joão de meriti','Duque de Caxias'],
metodo1: carregarSelects
} 

var sp = {
nome: 'São paulo',
cidades: ['Diadema','Bauru','Suzano','Martinopolis','Regente Feijo','Indiana','Rancharia','Assis'],
metodo1: carregarSelects
}


var mg = {
nome: 'Minas Gerais',
cidades: ['Belo Horizonte','Betim','Contagem'],
metodo1: carregarSelects
}


function mods(){
    
	var listaEstados = document.getElementById('estados')

	for (var i = 0; i < arrayEstados.length; i++) {
		var item = document.createElement('option')
		item.text = arrayEstados[i]
		listaEstados.appendChild(item)
}
}
</script>
                           
                        
					<br>	<br>
					<div class="form_grupo">    
						<label for="email">E-mail</label><br>
                    	<input type="text" class="form_input" name="email" title="email" id="email" placeholder="E-mail" tabindex="3"> <br>
					</div>
					<div class="form_grupo">    
						<label for="tel">Telefone</label><br>
                    	<input type="tel" maxlength="15" onkeyup="handlePhone(event)" class="form_input" name="tel" id="tel" title="tel" placeholder="xx-xxxxxxxxx" tabindex="4" ><br>
					</div>
                    <div class="form_grupo">
						<label for="chave">Senha</label><br>
                    	<input type="password" class="form_input" name="chave"  maxlength="8" id="chave" title="chave" placeholder=" 8 caracteres" tabindex="5"><br>
					</div>
                    <div class="form_grupo">
						<label for="chave">Confirme a senha</label><br>
                    	<input type="password" class="form_input" name="confirme"  maxlength="8" id="confirme" title="confirme" placeholder=" 8 caracteres" tabindex="5"><br><br>
					</div>
					<input type="submit" name="submit" value="cadastrar">
                </form><br><br>
       			<div style="text-align:center"><a href="index.php">Voltar</a></div><br><br>
				<div style="color:#F71317;"><h2><?php if(isset($_POST["submit"])){print"<script>alert('$msg')</script>";} ?></h2></div>
                
            </div>
        </article>
        <div class="quebra"></div>
    </main>
    <script>
    	
		function validacao(){
			
			if(document.form.email.value=="" || document.form.email.value.indexOf('@')==-1 || document.form.email.value.indexOf('.')==-1)
			{
			alert("Por favor, Preencha um endereço de E-mail valido");	
			document.form.email.focus();
			return false;
			}
			
		
						
			if(document.form.chave.value == "" || document.form.chave.value.length != 8 )	{
			alert("Digite uma senha valida de 8 digitos");
			document.form.chave.focus();	
			return false;
			}
			
			if(document.form.chave.value != document.form.confirme.value )	{
			alert("Digite a confirmação corretamente");
			document.form.chave.focus();	
			return false;
			}
			
		}
    
    </script>

    <script>
        const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
         if (!value) return ""
        value = value.replace(/\D/g,'')
         value = value.replace(/(\d{2})(\d)/,"($1) $2")
         value = value.replace(/(\d)(\d{4})$/,"$1-$2")
         return value
        }
    </script>

    <script>

            new statesCitiesBR({
	            states: {
		        elementID: "selects_estado"
	        }
            });





    </script>
    <footer id="rodape_index">
    
    </footer>
    <div class="quebra"></div>

	</div>
</body>
</html>