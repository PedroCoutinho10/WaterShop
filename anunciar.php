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
//reg_imagem1

if($_POST[reg_imagem1]==NULL && $_POST[reg_imagem2]==NULL && $_POST[reg_imagem3]==NULL) {
   // $sql = "INSERT INTO artigos (titulo,categoria,descricao, preco)VALUES ('$_POST[reg_titulo]','$_POST[reg_categoria]','$_POST[reg_descricao]','$_POST[reg_preco]')";
    echo "Por favor insira pelo menos 1 imagem!";
    header('Location: anuncio.html');
}else if($_POST[reg_imagem2]==NULL && $_POST[reg_imagem3]==NULL){
    $sql = "INSERT INTO artigos (titulo,categoria,descricao, preco,imagem1)VALUES ('$_POST[reg_titulo]','$_POST[reg_categoria]','$_POST[reg_descricao]','$_POST[reg_preco]', '$_POST[reg_imagem1]')";
    header('Location: index.html');
}
else if($_POST[reg_imagem3]==NULL){
    $sql = "INSERT INTO artigos (titulo,categoria,descricao, preco,imagem1, imagem2, imagem3)VALUES ('$_POST[reg_titulo]','$_POST[reg_categoria]','$_POST[reg_descricao]','$_POST[reg_preco]', '$_POST[reg_imagem1]','$_POST[reg_imagem2]')";
    header('Location: index.html');
}else{
    $sql = "INSERT INTO artigos (titulo,categoria,descricao, preco,imagem1, imagem2, imagem3)VALUES ('$_POST[reg_titulo]','$_POST[reg_categoria]','$_POST[reg_descricao]','$_POST[reg_preco]', '$_POST[reg_imagem1]','$_POST[reg_imagem2]','$_POST[reg_imagem3]')";
    header('Location: index.html');
}

// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

// MOSTRA A MENSAGEM DE SUCESSO
mysqli_close($con);

?>


