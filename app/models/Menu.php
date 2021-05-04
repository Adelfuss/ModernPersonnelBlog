<?php
function selectAllMenuItems(){
    $sql = "SELECT * FROM menu";
    $stmt = queryExecute($sql);
    $result = $stmt->fetchAll();
    return $result;
}

function selectAllQuickLinks(){
    $sql = "SELECT * FROM footer_links";
    $stmt = queryExecute($sql);
    $result = $stmt->fetchAll();
    return $result;
}