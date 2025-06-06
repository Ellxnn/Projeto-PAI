<?php
session_start();


$_SESSION['atendimento']['queixas'] = [
    'data_atendimento' => $_POST['data_atendimento'] ?? '',
    'descricao_motivo' => $_POST['descricao_motivo'] ?? '',
    'queixas' => $_POST['queixas'] ?? [],
    'febre_graus' => $_POST['febre_graus'] ?? '',
    'dor_local' => $_POST['dor_local'] ?? '',
    'estado_inicial' => $_POST['estado_inicial'] ?? ''
];


header('Location: 03.inicial2.html');
exit();
?>