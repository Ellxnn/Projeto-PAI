<?php
session_start();


$_SESSION['atendimento']['evolucao'] = [
    'comentario' => $_POST['comentario'] ?? '',
    'procedimento' => $_POST['procedimento'] ?? []  
];


header('Location: 07.Parametros2.html');
exit();
