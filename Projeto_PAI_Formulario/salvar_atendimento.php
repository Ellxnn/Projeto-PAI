<?php
$conn = pg_connect("host=postgres.railway.internal port=5432 dbname=railway user=postgres password=hOAtyENBNJAVnaxdzphaHIZFOAylhVWJ");

if (!$conn) {
    die("Erro de conexão com o banco de dados.");
}


$nome = $_POST['nome'];
$idade = $_POST['idade'];
$genero = $_POST['genero'];
$cpf = $_POST['cpf'];
$curso = $_POST['curso'];

pg_query_params($conn, "INSERT INTO paciente (nome, idade, genero, cpf, curso) VALUES ($1, $2, $3, $4, $5)", 
    array($nome, $idade, $genero, $cpf, $curso));


$result = pg_query($conn, "SELECT currval(pg_get_serial_sequence('paciente','id'))");
$row = pg_fetch_row($result);
$paciente_id = $row[0];


$data_atendimento = $_POST['data_atendimento'];
$motivo = $_POST['motivo'];
$queixas = isset($_POST['queixas']) ? $_POST['queixas'] : array();
$estado_inicial = $_POST['estado_inicial'];

pg_query_params($conn, "INSERT INTO atendimento (paciente_id, data_atendimento, motivo, queixas, estado_inicial) VALUES ($1, $2, $3, $4, $5)",
    array($paciente_id, $data_atendimento, $motivo, $queixas, $estado_inicial));

$result = pg_query($conn, "SELECT currval(pg_get_serial_sequence('atendimento','id'))");
$row = pg_fetch_row($result);
$atendimento_id = $row[0];


$hem_ext = $_POST['hemorragia_externa_local'];
$hem_int = $_POST['hemorragia_interna_local'];
$ferimentos = isset($_POST['ferimentos']) ? $_POST['ferimentos'] : array();
$vias_aereas = $_POST['vias_aereas'];
$respiratorio = isset($_POST['respiratorio']) ? $_POST['respiratorio'] : array();

pg_query_params($conn, "INSERT INTO exame_inicial (atendimento_id, hemorragia_externa_local, hemorragia_interna_local, ferimentos, vias_aereas, respiratorio) VALUES ($1, $2, $3, $4, $5, $6)",
    array($atendimento_id, $hem_ext, $hem_int, $ferimentos, $vias_aereas, $respiratorio));


$circulatorio = isset($_POST['circulatorio']) ? $_POST['circulatorio'] : array();
pg_query_params($conn, "INSERT INTO circulatorio (atendimento_id, dados) VALUES ($1, $2)",
    array($atendimento_id, $circulatorio));


$sinais = isset($_POST['neuro_sinais']) ? $_POST['neuro_sinais'] : array();
$abertura_ocular = $_POST['abertura_ocular'];
$resposta_verbal = $_POST['resposta_verbal'];
$resposta_motora = $_POST['resposta_motora'];

pg_query_params($conn, "INSERT INTO neuro (atendimento_id, sinais, abertura_ocular, resposta_verbal, resposta_motora) VALUES ($1, $2, $3, $4, $5)",
    array($atendimento_id, $sinais, $abertura_ocular, $resposta_verbal, $resposta_motora));


$descricao = $_POST['evolucao'];
$procedimentos = isset($_POST['procedimentos']) ? $_POST['procedimentos'] : array();
pg_query_params($conn, "INSERT INTO evolucao (atendimento_id, descricao, procedimentos) VALUES ($1, $2, $3)",
    array($atendimento_id, $descricao, $procedimentos));


for ($i = 1; $i <= 10; $i++) {
    $hora = $_POST["hora_$i"];
    $pa = $_POST["pa_$i"];
    $fc = $_POST["fc_$i"];
    $spo2 = $_POST["spo2_$i"];
    $hgt = $_POST["hgt_$i"];
    $temp = $_POST["temp_$i"];
    $glasgow = $_POST["glasgow_$i"];

    if ($hora != "") {
        pg_query_params($conn, "INSERT INTO sinais_vitais (atendimento_id, hora, pa, fc, spo2, hgt, temp, glasgow) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)",
            array($atendimento_id, $hora, $pa, $fc, $spo2, $hgt, $temp, $glasgow));
    }
}

pg_close($conn);
echo "Atendimento registrado com sucesso.";
?>