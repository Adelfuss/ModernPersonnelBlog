<?php

function topicIndex(){
    $viewName = getAction();
    modelAutoloader(['Posts','Pagination']);
    $getData = getParameters('GET');
    $topicName = $getData['topic'];
    $paginationPage = $getData['page'];
    $pagination = pagination((int)$paginationPage,$topicName);
    $posts = postsByTopic($topicName,$pagination['start'],AMOUNT_CATEGORY_POSTS);
    $components = renderAll($viewName,['posts' => $posts,'pageCount' => $pagination['amount'],
        'isActive' =>$pagination['pageNumber'], 'topicName' => $topicName]);
    renderLayout($components, [
        'title'=> META_PARAMS['index_title'], 'charset' => META_PARAMS['html_charset'] ,
        'viewportType' => META_PARAMS['viewportType']
    ]);
}