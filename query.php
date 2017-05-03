<?php $jsonFile = 'films.json';
$jsonData = json_decode(file_get_contents($jsonFile), true);

// Iterate through JSON and build INSERT statements
foreach ($jsonData as $id=>$row) {
  foreach ($row['entry'] as $key => $value) {
    // var_dump($value['im:name']['label']);
    echo "INSERT INTO `movie`(`title`, `category`, `summary`) VALUES ('".strip_quotes($value['im:name']['label'])."','".strip_quotes($value['category']['attributes']['label'])."','".strip_quotes($value['summary']['label'])."');" . "\n";
  }
  // var_dump($row['entry'][0]['im:name']['label']);
    // $insertPairs = array();
    // foreach ($row as $key=>$val) {
    //     $insertPairs[addslashes($key)] = addslashes($val);
    // }
    // $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
    // $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';
    //
}

function strip_quotes($string){
  return str_replace("'", " ", $string);
}
?>
