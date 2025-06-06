<?php
session_start();


$_SESSION['atendimento']['dados_paciente'] = [
    'nome' => $_POST['nome'] ?? '',
    'idade' => $_POST['idade'] ?? '',
    'genero' => $_POST['genero'] ?? '',
    'cpf' => $_POST['cpf'] ?? '',
    'curso' => $_POST['curso'] ?? ''
];


header('Location: 02.Queixas2.html');
exit();
?>