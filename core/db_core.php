<?php
function connect(){
    static $db = NULL;
    if ($db == NULL){
        $dsn = "mysql:dbname=" .DB_CONNECTION['DATABASE_NAME'] .";host=" . DB_CONNECTION['HOST_NAME'];
        try {
            $db = new PDO($dsn,DB_CONNECTION['USER_NAME'],DB_CONNECTION['USER_PASSWORD']);
        }
        catch (PDOException $e){
            databaseFatalError($e);
        }
        $db->exec("SET NAMES" . DB_CONNECTION['DATABASE_CHARSET']);
        databaseError($db);
    }
    return $db;
}

function databaseError($databaseError){
    $errors = $databaseError->errorInfo();
     if (!empty($errors[0]) && $errors[0] != DB_QUERY_ERROR_OK){
         doLogs($errors);
     }
}

function databaseFatalError($errors){
    doLogs($errors);
    require_once FATAL_ERROR_LAYOUT;
    exit();
}

function doLogs($errors){
    ob_start();
    print_r($errors);
    $errorsInfo = ob_get_clean();
    $errorsInfo = date("Y-m-d H:i:s") ." ". $errorsInfo . PHP_EOL;
    file_put_contents(LOGS,$errorsInfo,FILE_APPEND);
}

function queryExecute($sql,$data = []){
    $db = connect();
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    databaseError($stmt);
    return $stmt;
}

