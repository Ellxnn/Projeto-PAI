<?php
session_start();

$_SESSION['atendimento']['neuro'] = [
    'nivel' => $_POST['nivel'] ?? '',
    'abertura-ocular' => $_POST['abertura-ocular'] ?? '',
    'resposta-verbal' => $_POST['resposta-verbal'] ?? '',
    'resposta-motora' => $_POST['resposta-motora'] ?? ''
];

header('Location: 06.Evolucao2.html');
exit();
