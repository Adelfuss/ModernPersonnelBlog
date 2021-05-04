<?php
function postIndex(){
    $viewName = getAction();
    modelAutoloader(['Posts']);
    $getData = getParameters('GET');
    $postTitle = $getData['title'];
    postViewUpdate($postTitle);
    $post = postbyTitle($postTitle);
    $components = renderAll($viewName,['post' => $post]);
    renderLayout($components, [
        'title'=> META_PARAMS['index_title'], 'charset' => META_PARAMS['html_charset'] ,
        'viewportType' => META_PARAMS['viewportType']
    ]);
}