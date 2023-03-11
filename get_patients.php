<?php
include "connection_db.php";


$user_type_name = 'patient';


$user_type_id = $link->prepare('SELECT id FROM user_types WHERE name = ? ');
$user_type_id->bind_param('s', $user_type_name);
$user_type_id->execute();
$user_type_id->bind_result($id);
$user_type_id->fetch();
$user_type_id->close();


$patient_name = $link->prepare('select name from users where user_type_id = ?  ');
$patient_name->bind_param('i', $id);
$patient_name->execute();

$result = $patient_name->get_result();
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($rows);
