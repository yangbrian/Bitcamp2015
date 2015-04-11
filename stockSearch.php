<?php
//Get stock data off yahoo API
$symbol = strtoupper($_GET['ticker']);
$test = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=AAPL&f=xopm3m8m4m6jkl1");
$csv = str_getcsv($test);
$values = array('stockExchange' => $csv[0],
    'open' => $csv[1],
    'prevClose' => $csv[2],
    '50dayAvg' => $csv[3],
    '50dayAvgPercent' => $csv[4],
    '200dayAvg' => $csv[5],
    '200dayAvgPercent' => $csv[6],
    '52wkLow' => $csv[7],
    '52wkHigh' => $csv[8],
    'lastTradedPrice' => $csv[9]
);
$test = json_encode($values);

//foreach($values as $key => $value)
//{
//    echo "$key: $value<br />\n";
//}
?>


<div>
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