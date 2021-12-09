<?php
        function writeToFile(){
            $toWrite = $name . " " . $surname . " " . $email . " " . $password . "\n";
            if (!$handle = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $toWrite) === FALSE) {
                echo "Cannot write to file ($filename)";
                exit;
            }
            fclose($handle);
            echo '<h1> registrato con successo </h1>';
        }
?>