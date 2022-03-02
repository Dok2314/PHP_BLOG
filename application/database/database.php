<?php
ini_set('error_reporting', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connect.php';

// Проверяем на ошибки выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
}

//Запрос на получение всех данных с одной таблици
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql .= " WHERE $key = $value";
            }else{
                $sql .= " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll();
}

//Запрос на получение одной строки с одной таблици
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i === 0){
                $sql .= " WHERE $key = $value";
            }else{
                $sql .= " AND $key = $value";
            }
            $i++;
        }
    }
    $sql .= " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetch();
}

$params = [
    'is_admin' => 1,
    'username' => 'Dok'
];

var_dump(selectAll('users', $params));