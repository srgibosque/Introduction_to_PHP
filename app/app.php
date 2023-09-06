<?php

declare(strict_types = 1);

//function that reads the files from the directories
// ": array" vol dir que la funció retornarà un array
function getTransactionFiles(string $dirPath) : array{
  $files = [];
// scandir retorna una llista de arxius o directoris del directori que es passa com a paràmetre.
// retorna un array amb 3 valors. Un "." (current directory) , ".." parent directory i el arxiu que ens interessa. Posarem una condició perquè només entrin al array els arxius.
  foreach(scandir($dirPath) as $file){

    if ($file !== '.' && $file !== '..'){

      $files[] = $dirPath . $file;

    }
  }

  return $files;
}

//Funció que llegeix el contingut dels files
function getTransactions(string $filePath) : array {
  
  // verifica si el arxiu existeix
  if (! file_exists($filePath)){

    trigger_error('File' . $filePath . 'does not exist', E_USER_ERROR);

  } else {

    //Obrim el arxiu en mode lectura
    $file = fopen($filePath, 'r');

    //llegim la primera linia del arxiu i no fem res amb ella, d'aquest mode la descartem
    fgetcsv($file);

    //llegim el arxiu linia per linia i la posem en el array següent
    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false) {

      $transactions[] = $transaction;

    }
  }

return $transactions;
}