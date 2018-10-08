<?php


// INICIA LIGAÇÃO À BASE DE DADOS
$con=mysqli_connect("127.0.0.1", "root", "", "WaterShop");

// VERIFICA A LIGAÇÃO NÃO TEM ERROS
if (mysqli_connect_errno())
{
    // CASO TENHA ERROS MOSTRA O ERRO DE LIGAÇÃO À BASE DE DADOS
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
if($_POST[reg_password]==$_POST[reg_password_confirm]){
    $senha = md5($_POST[reg_password]);
    $sql = "INSERT INTO user (nome,email,password, telemovel, localizacao)VALUES ('$_POST[reg_nome]','$_POST[reg_email]','$senha','$_POST[reg_telemovel]','$_POST[reg_localizacao]')";
   header('Location: index.html');
}else{
    header('Location: registar.php');
    }

// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

// MOSTRA A MENSAGEM DE SUCESSO
mysqli_close($con);

?>


