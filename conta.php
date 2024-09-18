
<?php require_once("Connections/ConnectDB.php"); ?>


<?php include ("verifica3.php");
      
		require("ConnectDB.php");
		
		$sql2 = "SELECT * FROM `public` WHERE `id_public_user` = '$id_usuarios' && `ativo` = 1 ";		
        $resultt = mysqli_query($ConnectDB, $sql2);

        $sql3 = "SELECT * FROM `usuarios` WHERE `id_usuarios` = '$id_usuarios'";	
        $resulttt = mysqli_query($ConnectDB, $sql3);
        $consulttt = mysqli_fetch_assoc($resulttt);
		
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>SexyTime</title>    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="shortcut icon" href="http://d25zlb44gqlazw.cloudfront.net/static/img/default/favicon-10c1eb8e.png"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90988157-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>
    
    

                

    <table style="max-width: 900px; width: 85%; height: 30em; float: center; background-color: #808080; border:2px solid #fff;" cellspacing="0"
        cellpadding="0" align="center" bgcolor="#69bc37">
        <tbody>
            <tr>
                <td style="text-align: center;">
                <table bgcolor="##7f00f3"  cellpadding="0" cellspacing="12" width="100%" float="center" >
                        
                        <tbody>
                            <tr>
                                
                            <td align="right">
                                        <span style="color:#69b6e0">|
                                        <a href="paginaprincipal.php"
                                                style="color: #fff; font-size: 1em; text-decoration: none;"
                                                target="_self" rel="nofollow">Home</a></span>  
                                        <span style="color:#69b6e0">|  
                                        <a href="publicar.php"
                                                style="color: #fff; font-size: 1em; text-decoration: none;"
                                                target="_self" rel="nofollow">Publicar</a></span>                                       
                                        <span style="color:#69b6e0">|
                                        <a href="assinar.php"
                                                style="color: #fff; font-size: 1em; text-decoration: none;"
                                                target="_self" rel="nofollow">Assinatura</a></span>                                 
                                        <span style="color:#69b6e0">|
                                            <a href="explorar.php"
                                                style="color: #fff; font-size: 1em; text-decoration: none;"
                                                target="_self" rel="nofollow">Explorar</a></span>                                        
                                        
                                        <span style="color:#69b6e0">|                                                
                                        <form action="sair2.php" method="post"  onsubmit="return Checkfiles1(this)">
                                        <span style="color:#69b6e0">                                               
                                            <input type="submit" id="sair" name="sair" value="sair">
                                                </form>
                                    </td>
                            </tr>
                        </tbody>
                    </table>

                    <script>

                function Checkfiles1(){
                    var resposta = confirm("Deseja sair do Sistema?");


                    if (resposta != true) {
                        return false;
                    }
                        
               
                }
            </script>
            
                     
                        <table bgcolor="#0083ca" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr><br>
                                    
                                    
                                
                                
                                    <fieldset>
                                        <legend style="font-size: 1.5em; background-color: #fff; font-family: Candara;">CADASTRO PESSOAL</legend>
                                        
                                           

                                                            <div style=" height: 12em; margin: 10px; float:left;  ">
                                                            <div id="foto_perfil_user"> 
                                                            <?php if("$consulttt[foto_perfil]" != NULL) { ?>
                                                            <img src="image/perfil/<?php echo "$consulttt[foto_perfil]"?>" > 
                                                            <?php } else { ?>
                                                            <img src="image/perfil.jpg" alt="">
                                                            <?php } ?>
                                                            </div>
                                                            </div>

                                            <div style=" height: 10em; width: 30em; float: right; margin: 10px; text-align: left; padding: 20px; margin-right: 2em; ">
                                                        <div style="height: auto; width: 8,5em; float: left; font-size:17px; font-family: Arial ; color: #000;">
                                                            <b><p><span>Nome: </span><br></p></b>
                                                            <b><p><span>E-mail: </span><br></p></b>
                                                            <b><p><span>Tel: </span><br></p></b>
                                                        </div>
                                                    <div style="height: auto; width: 17em;  float: right; font-size:17px; font-family: Arial;  color: #000;">
                                                        <p><span><?php echo "$consulttt[nome]"; ?> </span><br></p>
                                                        <p><span><?php echo "$consulttt[email]"; ?> </span><br></p>
                                                        <p><span><?php echo "$consulttt[tel]"; ?> </span><br></p>
                                                    </div><br><br>
                                                    
                            	            </div>
                                            <button style="font-size: 1em; padding: 3px; width: 17em; margin-top: 1.5em; border:1px solid #000;"><a href="alterarcadastro.php">EDITAR FOTO PERFIL</a></button>
                                    </fieldset>
                                    <br>
                                    <fieldset>
                                        <legend style="font-size: 1.5em; background-color: #fff; font-family: Candara;">EXTRA</legend>
                                        <div style=" height: 12em; width: 40em;  margin: 10px; text-align: left; padding: 20px; margin-right: 2em; margin-left: 5em;">
                                                        <div style="height: auto; width: 8,5em; float: left; font-size:17px; font-family: Arial; color: #000; ">
                                                            <b><p><span>Nome: </span><br></p></b>
                                                            <b><p><span>Cidade: </span><br></p></b>
                                                            <b><p><span>Relacionamento: </span><br></p></b>
                                                            <b><p><span>Nome: </span><br></p></b>
                                                            <b><p><span>Cidade: </span><br></p></b>
                                                            <b><p><span>Relacionamento: </span><br></p></b>
                                                            <b><p><span>Nome: </span><br></p></b>
                                                            <b><p><span>Cidade: </span><br></p></b>
                                                            <b><p><span>Relacionamento: </span><br></p></b>
                                                        </div>
                                                    <div style="height: auto; width: 17em;  float: right; font-size:17px; font-family: Arial; color: #000; ">
                                                            <b><p><span>Teste </span><br></p></b>
                                                            <b><p><span>Martinopolis/SP </span><br></p></b>
                                                            <b><p><span>Liberal </span><br></p></b>
                                                            <b><p><span>Teste </span><br></p></b>
                                                            <b><p><span>Martinopolis/SP </span><br></p></b>
                                                            <b><p><span>Liberal </span><br></p></b>
                                                            <b><p><span>Teste </span><br></p></b>
                                                            <b><p><span>Martinopolis/SP </span><br></p></b>
                                                            <b><p><span>Liberal </span><br></p></b>
                                                    </div>
                                                   
                            	            </div>
                                            
                                            
                                    </fieldset><br>

                                    <fieldset><br>
                                        <legend style="font-size: 1.5em; background-color: #fff; font-family: Candara;">GALERIA</legend>
                                            <div style="text-align: center;">

                                                

                                            
                                            
                                            
                                                <div style=" width: 100%; font-size:1em; font-family: arial; color: #ffff;">
                                                  
                                            
                                                </div><br>
                                                <?php while($repete = mysqli_fetch_array($resultt)) { ?>
                                                <div class="cx_postagem">
                                                    <form action="excluir_foto.php" method="post" onsubmit="return Checkfiles(this)">
                                                    <img src="image/public/<?php echo "$repete[imagem]"?>" > 
                                                    <input type="hidden" name="nome" title="nome" id="nome"  value="<?php echo "$repete[nome]"?>">           
            	                                    <input type="hidden" name="email" title="email" id="email"  placeholder="email" tabindex="1" value="<?php echo "$repete[email]"?>">
                                                    <input type="hidden" name="data" title="data" id="data" placeholder="data" tabindex="2" value="<?php echo "$repete[data]"?>">                       
                                                    <input type="hidden" name="hora" id="tel" title="tel" placeholder="xx-xxxxx-xxxx" tabindex="4" value="<?php echo "$repete[hora]"?>">
                                                    <input type="hidden" name="tel" title="tel" id="tel" placeholder="tel" tabindex="2" value="<?php echo "$repete[tel]"?>">
                                                    <input type="hidden" name="data" title="data" id="data" placeholder="data" tabindex="2" value="<?php echo "$repete[data]"?>">                       
                                                    <input type="hidden" name="id_public" title="id_public" id="id_public" placeholder="id_public" tabindex="2" value="<?php echo "$repete[id_public]"?>">
                                                    <input type="hidden" name="imagem" title="imagem" id="imagem" placeholder="imagem" tabindex="2" value="<?php echo "$repete[imagem]"?>">
                                                    <input type="hidden" name="comentario" title="comentario" id="comentario" placeholder="comentario" tabindex="2" value="<?php echo "$repete[comentario]"?>">                       
                                                   
                                                    <input type="hidden" name="qtd" title="qtd" id="qtd" placeholder="qtd" tabindex="2" value="<?php echo "$repete[qtd]"?>">
                                                     
                                                </div><br>
                                                <b><span><b><?php echo "$repete[comentario]"?><b></span></b><br><br>
                                                <input type="submit" name="excluir" id="excluir" value="Excluir Foto">
                                               
                                                
                                                </form>

                                                <script>

                function Checkfiles(){
                    var resposta = confirm("Deseja remover esse registro?");


                    if (resposta != true) {
                        return false;
                    }
                        
               
                }
            </script>
                                                <hr>
                                                <?php } ?> 
                                                <br>
                                            
                                            
                                           
                                            <br><br><br><br>



                                    </fieldset>
                                    <div> <a href="paginaprincipal.php">Voltar</a></div>
                               

                                
                            <br>

                            
    
    </td>
    </tr>
    </tbody>
    </table>
    
                        
                    </table>



                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>