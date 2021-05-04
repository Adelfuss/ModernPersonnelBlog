<?php
function checkValue($key,$value,$is_admin = true){
    $ROUTE = ($is_admin) ? ROUTE_ADMIN_DEFAULT[$key] : ROUTE_DEFAULT[$key];
    if (empty($value)){
        if ($is_admin) {
            $router = $ROUTE;
        }
        else {
            $router = $ROUTE;
        }
    }
    else {
        $router = $value;
    }
    return $router;
}

function matchRoute($queryString){
   global $routes;
   global $routerCheck;
   foreach ($routes as $route){
       if (preg_match("#{$route}#ui",$queryString,$matches)){
           $is_admin = false;
           if (empty($matches)){
               $router ['controller'] =  ROUTE_DEFAULT['controller'];
               $router ['action'] = ROUTE_DEFAULT['action'];
               break;
           }
           if (!empty($matches['prefix'])){
               $is_admin = true;
               $router['prefix'] = $matches['prefix'];
           }
           foreach ($matches as $key =>$value){
               if ($key === 'controller' || $key === 'action'){
                   $routerCheck[$key] = $value;
               }
           }
           foreach ($routerCheck as $key=>$value){
               if ($is_admin){
                   $router[$key] = checkValue($key,$value);
               }
               if (!$is_admin){
                   $router[$key] = checkValue($key,$value,false);
               }
           }
           break;
       }
   }
   return $router;
}
function dispatch(){
     global $queryString;
     $dispatch = matchRoute($queryString);
     $controller = controllerName($dispatch['controller']);
     $action = actionName($controller,$dispatch['action']);
     if (isset($dispatch['prefix'])){
         $action = $dispatch['prefix'] . $controller . ucfirst($dispatch['action']);
         $controller = ucfirst($dispatch['prefix']) . $controller;
     }
     if (file_exists($path = CONTROLLERS . $controller . ".php")){
          saveControllerAction($controller,$action);
          require_once $path;
          if (function_exists($action)){
              call_user_func($action);
          }
     }
}