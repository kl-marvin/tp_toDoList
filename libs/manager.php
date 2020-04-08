<?php
function getPDO():PDO{
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    return new PDO(DSN, DB_USER, DB_PASS, $options);
}

function getDataFromQuery($sql, $pdo): Array {

    $request = $pdo->query($sql);
    $data = $request->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}