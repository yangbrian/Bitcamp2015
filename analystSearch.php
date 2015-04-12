<?php

/* we've only got an hour left so hack solution time! searching through a csv */
/* we'll move this into a real database in the near future */

$name = strtoupper($_POST['analyst']);

$file = fopen("images/FinalFeed.csv","r");

$infractions = Array(
    "regAction" => "Legal Action taken against them",
    "hasCriminal" => "Criminal Record/Crime History",
    "hasBankrupt" => "Declared Bankruptcy",
    "HasCivilJudc" => "Civil Judiciary Hearing",
    "hasBond"=> "Has Bond Against them",
    "hasJudgement" => "Adverse legal judgement against person",
    "haslnvstgn" => "Has investigation against them/has been investigated",
    "hasCustComp" => "has child custody compromise",
    "hasTermination" => "been fired"
);

while(! feof($file)) {
    $line = fgetcsv($file);
    if (strcasecmp(trim($line[0]), $name) == 0) {
        echo '<h2>' . $line[0] . '</h2>';

        $num_infractions = $line[2];
        echo "<strong>" . $num_infractions . "</strong>" . ($num_infractions != 1 ? " infractions" : " infraction");

        if ($num_infractions != 0) {
            echo '<ul id="infractions">';
            for ($i = 3; $num_infractions-- > 0; $i++) {
                echo '<li>' . $infractions[$line[$i]] . '</li>';
            }
            echo '</ul>';
        }

        echo '<p><a target="_blank" href="' . $line[1] . '">Learn more</a>';

        echo '<br/><br/>Meta Rating: ' . $line[sizeof($line) - 1];
        return;
    }
}

// if it reaches this point, name not found
echo 'Analyst not found! Please try again.';

fclose($file);

?>
