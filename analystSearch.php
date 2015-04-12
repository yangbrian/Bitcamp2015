<?php

/* we've only got an hour left so hack solution time! searching through a csv */
/* we'll move this into a real database in the near future */

$name = strtoupper($_POST['analyst']);

$file = fopen("images/FinalFeed.csv","r");

while(! feof($file)) {
    $line = fgetcsv($file);
    if (strcasecmp(trim($line[0]), $name) == 0) {
        $num_infractions = $line[2];
        echo $num_infractions . " infractions";

        if ($num_infractions != 0) {
            echo '<ul>';
            for ($i = 3; $num_infractions-- > 0; $i++) {
                echo '<li>' . $line[$i] . '</li>';
            }
            echo '</ul>';
        }

        echo '<br/><br/>Meta Rating: ' . $line[sizeof($line) - 1];
        return;
    }
}

// if it reaches this point, name not found
echo 'Analyst not found! Please try again.';

fclose($file);

?>
