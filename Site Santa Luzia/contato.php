<!DOCTYPE html>
<html lang="PT-Br">
    <head>
        <meta charset="Utf-8">
        <Title>Santa Luzia E.C</Title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/formulario.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jsquery.js"></script>
    </head>
    
   
    <div id="interface">
        <header id="cabecalho">
            <hgroup>
                <h2><i>SITE OFICIAL</i></h2>
                <h1>E.C SANTA LUZIA</h1>
                </hgroup>
            <img id="icone" src="imagens/logo.png" width="120" height="120">
<nav id="menu">       
    
    <ul type="1">
        <li><A href="index2.html"><p>Início</p></A></li> 
        <li><a href="calendario.html"><p>Calendário</p></a></li>
        <li><a href="fotos.html"><p>Fotos</p></a></li>
        <li><a href="elenco.html"><p>Elenco</p></a></li>
        <li><a href="contato.html"><p>Fale conosco</p></a></li>
    </ul>
   
   
</nav> 
    </header>
    </div>
        <body>
            <form class="formulario" method="post"> 
                <p> Envie uma mensagem preenchendo o formulário abaixo</p>
                
                <div class="field">
                    <label for="nome">Seu Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome*" required>
                </div>
                
                <div class="field">
                    <label for="telefone">Seu Telefone:</label>
                    <input type="text" id="telefone" name="telefone" placeholder="Digite seu Telefone">
                </div>
        
                <div class="field">
                    <label for="email">Seu E-Mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu E-Mail*" required>
                </div>        
                <div class="field radiobox">
                    <span>Deseja receber nossas novidades?</span>
                    <input type="radio" name="novidades" id="sim" value="sim" checked><label for="sim">Sim</label>
                    <input type="radio" name="novidades" id="nao" value="nao"><label for="nao">Não</label>
                </div>
                <div class="field">
                    <label for="mensagem">Sua mensagem:</label>
                    <textarea name="mensagem" id="mensagem" placeholder="Mensagem*" required></textarea>
                </div>
        
                <input type="submit" name="acao" value="Enviar">
            </form>
            <?php
    // Criando nossas variáveis para guardar as informações do formulário
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $radio=$_POST['novidades'];
    $date=date("d/m/Y");
    $msg=$_POST['mensagem'];
    // formatando nossa mensagem (que será envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>Telefone:</b> '.$telefone.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Deseja receber novidades:</b> '.$radio.'<br>';
    $mensagem.='<b>Data de envio:</b> '.$date.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;
    // abaixo as requisições do arquivo phpmailer
    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");

    // chamando a função do phpmailer

$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'mail.nomedoservidor.com';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'email@seudominio.com.br';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = '0123456';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'ssl';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = 465;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('email@seudominio.com.br', 'Site');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('receptor@seudominio.com.br');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('index.php');</script>";
     }else{
        echo "<script>alert('E-Mail enviado com sucesso!');window.location.assign('index.php');</script>";
     }
     die
?>
                </div>
                <footer id="rodape">
                    <p>&copy;Copyright 2020 - Todos os direitos reservados. Site desenvolvido por Well Pozar</p>
               </footer>
        </body>
    </html>