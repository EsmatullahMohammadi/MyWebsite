<?php
    $files=fopen("file.txt","r");
    $oldvisit=fgets($files);
    $newvisite=$oldvisit+1;
    echo "Total visit: ".$newvisite;
    fclose($files);

    $files=fopen("file.txt","w");
    fwrite($files,$newvisite);
    fclose($files);
?>