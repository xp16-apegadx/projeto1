<?php
    // contante com o caminho da pasta raiz do projeto
    $rootPath = explode("/", $_SERVER['REQUEST_URI']);
    
    define("WWW", DIRECTORY_SEPARATOR.$rootPath[1].DIRECTORY_SEPARATOR);