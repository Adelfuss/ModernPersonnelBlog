<?php
function mainIndex(){
    $viewName = getAction();
    modelAutoloader(['Posts','Topics','Pagination','Menu']);
    $trendingPosts = trendingPosts(AMOUNT_TRENDING_POSTS);
    $recentPosts = recentPosts(AMOUNT_RESENT_POSTS);
    $components = renderAll($viewName,
        [
             'trendingPosts' =>$trendingPosts , 'recentPosts' => $recentPosts
        ]
    );
    renderLayout($components, [
        'title'=> META_PARAMS['index_title'], 'charset' => META_PARAMS['html_charset'] ,
        'viewportType' => META_PARAMS['viewportType']
    ]);
}