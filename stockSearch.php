<?php
//Get stock data off yahoo API
$symbol = strtoupper($_POST['ticker']);
$currentInfo = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=xopm3m8m4m6jkl1b4d0y0r0v0");
$csv = str_getcsv($currentInfo);

$values = array('stockExchange' => $csv[0],
    'open' => $csv[1],
    'prevClose' => $csv[2],
    '50dayAvg' => $csv[3],
    '50dayAvgPercent' => $csv[4],
    '200dayAvg' => $csv[5],
    '200dayAvgPercent' => $csv[6],
    '52wkLow' => $csv[7],
    '52wkHigh' => $csv[8],
    'lastTradedPrice' => $csv[9],
    'bookVal' => $csv[10],
    'divYield' => $csv[11],
    'divYieldPercent' => $csv[12],
    'peRatio' => $csv[13],
    'volume' => $csv[14],
);
$test = json_encode($values);

//foreach($values as $key => $value)
//{
//    echo "$key: $value<br />\n";
//}
?>

<div id="stockName">
    Stock information for: <strong><?php echo($symbol) ?></strong>
    <br>
    Last traded price: <?php echo($values['lastTradedPrice']); ?>
</div>
<table id="values">
    <tr class="valueRow">
        <td class="valueName">
            Open
        </td>
        <td class="value">
            <?php echo($values['open']);?>
        </td>
        <td class="valueName">
            Previous Close
        </td>
        <td class="value">
            <?php echo($values['prevClose']);?>
        </td>
    </tr>
    <tr class="valueRow">
        <td class="valueName">
            50 Day Avg
        </td>
        <td class="value">
            <?php
                echo($values['50dayAvg']);
                echo ' (';
                echo($values['50dayAvgPercent']);
                echo ')';
            ?>
        </td>
        <td class="valueName">
            200 Day Avg
        </td>
        <td class="value">
            <?php
            echo($values['200dayAvg']);
            echo ' (';
            echo($values['200dayAvgPercent']);
            echo ')';
            ?>
        </td>
    </tr>
    <tr class="valueRow">
        <td class="valueName">
            52 week high
        </td>
        <td class="value">
            <?php echo($values['52wkHigh']);?>
        </td>
        <td class="valueName">
            52 week low
        </td>
        <td class="value">
            <?php echo($values['52wkLow']);?>
        </td>
    </tr>
</table>
<div id="priceGraph">
    <img src="http://chart.finance.yahoo.com/z?s=<?php echo($symbol);?>&t=6m&q=l&l=on&z=l"/>
</div>
<div id="facts">
    <div id="factsHeader">
        Some interesting facts...
    </div>
    <ul id="factList">
        <?php
            if ($values['50dayAvgPercent'] < -0.05)
            {
                echo "<li class='fact'>" . $symbol . " has dipped <strong>" . $values['50dayAvgPercent'] . "</strong> over the past 50 days - now might want to be a good time to buy!</li>";
            }
            else if ($values['50dayAvgPercent'] > 0.05)
            {
                echo "<li class='fact'>" . $symbol . " has raised <strong>" . $values['50dayAvgPercent'] . "</strong> over the past 50 days - now might not be the best time to buy!</li>";
            }
        ?>
    </ul>
</div>