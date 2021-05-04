<?php
function App(){
    foreach (APP_ARRAYS as $key =>$value){
        if (!empty($$key)){
            getParameters($value,$$key);
        }
    }
    dispatch();
}