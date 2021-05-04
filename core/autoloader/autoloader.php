<?php
function autoloader(){
    $coreFiles = scandir(CORE);
    foreach ($coreFiles as $coreFile){
         if (is_file(CORE . $coreFile)){
             if ($coreFile == CORE_EXCEPTION){
                 continue;
             }
             require_once CORE . $coreFile;
         }
    }
}