<?php
function selectAllTopics(){
    $sql = "SELECT * FROM topics";
    $stmt = queryExecute($sql);
    return $stmt->fetchAll();
}




