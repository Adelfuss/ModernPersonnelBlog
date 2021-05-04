<?php
function trendingPosts($postAmount){
     $sql = "SELECT posts.id,posts.title,posts.image,posts.body,posts.created_at,users.username
      FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.viewers DESC LIMIT 0,$postAmount";
     $stmt = queryExecute($sql);
     $result = $stmt->fetchAll();
     return $result;
}

function recentPosts($postAmount){
    $sql = "SELECT posts.id,posts.title,posts.image,posts.body,posts.created_at,users.username
    FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC LIMIT 0,$postAmount";
    $stmt = queryExecute($sql);
    $result = $stmt->fetchAll();
    return $result;
}

function postsByTopic($categoryName,$start,$postAmount){
    $sql = "SELECT posts.id,posts.title,posts.image,posts.body,posts.created_at,users.username , topics.name
    FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN topics ON posts.topic_id = topics.id 
    WHERE topics.name = :categoryName ORDER BY posts.created_at DESC LIMIT $start,$postAmount";
    $stmt = queryExecute($sql,['categoryName' =>$categoryName]);
    $result = $stmt->fetchAll();
    return $result;
}

function postbyTitle($postTitle){
    $sql = "SELECT posts.title as title,posts.image as image,posts.body as body,posts.created_at as created_at,
    posts.viewers as viewers,users.username as username,topics.name as topic_name
    FROM posts INNER JOIN users ON (posts.user_id = users.id) INNER JOIN topics ON (posts.topic_id = topics.id)
    WHERE posts.title = :postTitle";
    $stmt = queryExecute($sql,['postTitle' => $postTitle]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function postViewUpdate($postTitle){
    $sql = "UPDATE posts SET viewers = viewers+1 WHERE title = :postTitle";
    $stmt = queryExecute($sql,['postTitle' => $postTitle]);
    $result = $stmt->rowCount();
    return $result;
}