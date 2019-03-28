<?php

$autoload = function ( $class ) {

    include_once('models/'.$class.'.php'); 

};

spl_autoload_register ( $autoload );

/*CONSTANTS CONFIGURATION*/ 
/**
 * CONST PATH = folder root project
 * CONST FOLDERS = array content their names folders for be generade in class Dir
 * CONST DOCUMENTS = array content their nnames documents for be generade in class Dir
 * CONST DATE_TODAY = current date in hour what run
 */
define ( 'PATH', 'C:/xampp/htdocs/appGenerator/projects/' );
define ( 'FOLDERS', [ 'models',  'controller', 'view', 'assets'] );
define ( 'DOCUMENTS', [ '.htaccess', 'config.php', 'index.php','info.txt' ] );
define ( 'DATE_TODAY', date('Y-m-d H:i:s') );