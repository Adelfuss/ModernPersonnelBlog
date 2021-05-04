<?php
function getParameters($arrayType, $parameters = []){
    static $data = [];
    if ($data[$arrayType] == NULL){
        $data[$arrayType] = clearData($parameters);
        return;
    }
    return $data[$arrayType];
}

function saveGetParameters($parameters,$position = 0){
    for ($position; $position < count($parameters); $position++){
        $data = explode(PARAMS_DELIMETER,$parameters[$position]);
        $key = $data[0];
        $params[$key] = $data[1];
    }
    getParameters('GET',$params);
    return $parameters[0];
}

function queryStrip($queryString){
    $result = explode(GET_DELIMITER,$queryString);
    if (stripos($result[0],PARAMS_DELIMETER) !== false){
        saveGetParameters($result);
    }
    else {
        $queryString = saveGetParameters($result,DEFAULT_STRIP_POSITION);
    }
    return $queryString;
}

function clearData($data){
    foreach ($data as $key =>$value){
        $clearData[$key] =  htmlspecialchars(trim($value),ENT_QUOTES);
    }
    return $clearData;
}

function dataValidation($data){

}

function controllerName($controllerName) {
    return ucfirst($controllerName);
}

function actionName($controllerName,$actionName){
    $controllerName = mb_strtolower($controllerName);
    $actionName = controllerName($actionName);
    $actionName = $controllerName . $actionName;
    return $actionName;
}

function saveControllerAction($controllerName = NULL,$actionName = NULL){
    static $data = NULL;
    if ($data['controller'] == NULL && $data['action'] == NULL){
        $data['controller'] = $controllerName;
        $data['action'] = $actionName;
        return;
    }
    return $data;
}

function getController(){
    $controller = saveControllerAction();
    return $controller['controller'];
}
function getAction(){
    $action = saveControllerAction();
    return $action['action'];
}

function modelAutoloader($modelsList = []){
    foreach ($modelsList as $value){
        require_once MODELS . "$value.php";
    }
}


function renderComponent($componentType, $layout){
    modelAutoloader(['Menu','Topics']);
    $componentPath = ($layout) ? ADMIN_LAYOUT . "includes/" : DEFAULT_LAYOUT . "includes/";
    switch ($componentType){
        case "header" :
            $componentPath = $componentPath . "header.php";
            if ($layout) {
               $component =  componentBuffer($componentPath);
            }
            else {
                $menu = selectAllMenuItems();
                $component = componentBuffer($componentPath,['menu' =>$menu]);
            }
            break;
        case "footer" :
            $componentPath = $componentPath . "footer.php";
            if (!$layout) {
                $menu = selectAllQuickLinks();
                $component = componentBuffer($componentPath,['menu'=>$menu]);
            }
            break;
        case "sidebar" :
            $componentPath = $componentPath . "sidebar.php";
            if ($layout) {
                $component = componentBuffer($componentPath);
            }
            else {
                $topics = selectAllTopics();
                $component = componentBuffer($componentPath,['topics'=>$topics]);
            }
            break;
    }
    return $component;
}

function componentBuffer($path,$data = []){
    extract($data);
    ob_start();
    require_once $path;
    $content = ob_get_clean();
    return $content;
}

function renderComponents($layout){
     $components = ($layout) ? LAYOUT_COMPONENTS_LIST['admin'] : LAYOUT_COMPONENTS_LIST['default'];
     foreach ($components as $value){
          $componentList[$value] = renderComponent($value,$layout);
     }
     return $componentList;
}

function renderAll($viewName,$data,$layout = 0){
    $components = renderComponents($layout);
    $viewPath = VIEWS . "$viewName.php";
    $components['content'] = componentBuffer($viewPath,$data);
    return $components;
}

function renderLayout($components,$metaData,$layout = 0){
    extract($components);
    extract($metaData);
    $layoutPath = ($layout) ? ADMIN_LAYOUT . "admin.php" : DEFAULT_LAYOUT . "default.php";
    require_once $layoutPath;
}

function dateTransform($date){
    $formatType = DATE_FORMAT_TYPE;
    return date($formatType,strtotime($date));
}

function contentPart($content){
    $content = strip_tags($content);
    $content = substr($content,0,CONTENT_PART);
    return $content;
}