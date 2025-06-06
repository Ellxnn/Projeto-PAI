<?php
session_start();


$_SESSION['atendimento']['exame_inicial'] = [
    'hemorragia_externa' => isset($_POST['hemorragia_externa']) ? true : false,
    'hemorragia_externa_local' => $_POST['hemorragia_externa_local'] ?? '',
    'hemorragia_interna' => isset($_POST['hemorragia_interna']) ? true : false,
    'hemorragia_interna_local' => $_POST['hemorragia_interna_local'] ?? '',

    'ferimentos' => $_POST['ferimentos'] ?? [],
    'amputacao_local' => $_POST['amputacao_local'] ?? '',

    'vias_aereas' => $_POST['vias_aereas'] ?? '',

    'respiratorio' => $_POST['respiratorio'] ?? []
];


header('Location: 04.Circulatorio2.html');
exit();
?>
