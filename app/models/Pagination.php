<?php

function pagination($start,$topicName){
    $paginationPage = $start;
    if ($start == 0 || $start == 1) {
        $paginationPage  = 1;
    }
    $pagination['start'] = ($paginationPage * AMOUNT_CATEGORY_POSTS) - AMOUNT_CATEGORY_POSTS;
    $postAmountQuery = "SELECT COUNT(posts.id) FROM posts INNER JOIN topics ON (posts.topic_id = topics.id) 
    WHERE topics.name = :topicName";
    $stmt = queryExecute($postAmountQuery,['topicName' => $topicName]);
    $result = $stmt->fetchAll();
    $postCount = count($result);
    $pagination['amount']  = ceil($postCount / AMOUNT_CATEGORY_POSTS);
    $pagination['pageNumber'] = $paginationPage;
    return $pagination;
}