<?php

    $sampleJson = "sample.json";
    $fh = fopen($sampleJson, 'r');
    $checkins = fread($fh, fileSize($sampleJson));
    fclose($fh);


    //var_dump(json_decode($json, true));

    $checkinsArr = json_decode($checkins, true);


    echo $checkins->meta['code'];
    echo "<br />";
    echo $checkins->checkins->items[0]->id;

    var_dump($checkinsArr, true);


?>
