<?php
session_start();

$_SESSION['atendimento']['circulatorio'] = [
    'pulso' => $_POST['pulso'] ?? '',
    'pele' => $_POST['pele'] ?? '',
    'pele_cianose_det' => $_POST['pele_cianose_det'] ?? '',
    'pele_fria_det' => $_POST['pele_fria_det'] ?? '',
    'dor_toracica' => $_POST['dor_toracica'] ?? ''
];


header('Location: 05.Neuro2.html');
exit();
