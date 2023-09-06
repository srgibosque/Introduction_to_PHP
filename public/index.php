<?php

declare(strict_types = 1);

// declarem el root path del projecte
//__DIR__ es refereix al directory arrel del projecte = C:\xampp\htdocs\Introductory_PHP_Project
//DIRECTORY_SEPARATOR és una contrabarra '\'
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;


//define(name, value) defines a constant
// Per norma les constants es posen en majúscula 
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

//Si volem que les funcions d'altres documents funcionin aquí, s'han d'importar

require APP_PATH . "app.php";

$files = getTransactionFiles(FILES_PATH);

// Per cada 'file' obtingut a la linia anterior volem treure les seves transaccions. Anirem acumulant aquestes transaccions de cada 'file' en un array gegant $transactions = [];
$transactions = [];

foreach($files as $file){
  $transactions = array_merge($transactions, getTransactions($file));
}

print_r($transactions);
