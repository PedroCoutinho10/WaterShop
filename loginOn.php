<?php
$link = mysqli_connect("127.0.0.1", "root", "", "WaterShop");
if (!$link) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$mensagem = '';
$email=$_POST[lg_mail];
$password=$_POST[lg_password];
$pass = md5($password);


if(isset($_POST['login'])) {
    if (empty($email) || empty($pass)) {
        $mensagem = "<div class='alert alert-danger'>Ambos os campos são obrigatórios!</div> ";
    } else {

        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $connect->prepare($query);
        $statement->execute(array('email' => $email));
        $count = $statement->rowCount();
        if ($count > 0) {
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                if (password_verify($pass, $row["password"])) {
                    setcookie("type", $row["user_type"], time()+3600);
                    header("location:index.html");
                }
                else
                {
                    $message = '<div class="alert alert-danger">Wrong Password</div>';
                }
            }
        }else
        {
            $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
        }
    }
}

// MOSTRA A MENSAGEM DE SUCESSO
mysqli_close($link);

?>



