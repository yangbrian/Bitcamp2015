<?php
//Get stock data off yahoo API
$symbol = strtoupper($_POST['ticker']);
$currentInfo = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=xopm3m8m4m6jkl1b4dyrva2");
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
    'avgDailyVolume' => $csv[15]
);

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
    <img src="http://chart.finance.yahoo.com/z?s=<?php echo($symbol);?>&t=6m&q=l&l=on&z=l&c=%5EDJI"/>
</div>
<div id="facts">
    <div id="factsHeader">
        Some interesting facts...
    </div>
    <ul id="factList">
        <?php
            //Dividends
            if ($values['divYield'] > 0)
            {
                echo "<li class='fact'>Hey look! " . $symbol . " pays <strong>$" . $values['divYield'] . "</strong> dividends per stock a year - " . $values['divYieldPercent'] . "% annually!";
            }

            //Check price vs 50 day averages (mid-term holdings)
            if ($values['50dayAvgPercent'] < -4)
            {
                echo "<li class='fact'>" . $symbol . " has dipped <strong>" . $values['50dayAvgPercent'] . "</strong> over the past 50 days - now might want to be a good time to sell!</li>";
            }
            else if ($values['50dayAvgPercent'] > 4)
            {
                echo "<li class='fact'>" . $symbol . " has raised <strong>" . $values['50dayAvgPercent'] . "</strong> over the past 50 days - now might not be the best time to buy!</li>";
            }

            //Check prices vs 200 day averages (long-term holdings)
            if ($values['200dayAvgPercent'] < -8)
            {
                echo "<li class='fact'>" . $symbol . " has dipped <strong>" . $values['200dayAvgPercent'] . "</strong> over the past 200 days - now might want to be a good time to buy long term!</li>";
            }
            else if ($values['200dayAvgPercent'] > 8)
            {
                echo "<li class='fact'>" . $symbol . " has raised <strong>" . $values['200dayAvgPercent'] . "</strong> over the past 200 days - now might not be the best time to buy long term!</li>";
            }

            //Volume - a measure of volatility
            if ($values['volume'] > ($values['avgDailyVolume'] * 1.1))
            {
                echo "<li class='fact'>" . $symbol . "'s volume is <strong>" . round(($values['volume'] - $values['avgDailyVolume']) / $values['volume'] * 100, 2) . "%</strong> higher than its normal daily average. Something's up!";
            }
            else if ($values['avgDailyVolume'] > ($values['volume'] * 1.1))
            {
                echo "<li class='fact'>" . $symbol . "'s volume is <strong>" . round(($values['avgDailyVolume'] - $values['volume']) / $values['avgDailyVolume'] * 100, 2) . "%</strong> lower than its normal daily average. Something's up!";
            }

            //Book value - basically, if the company bankrupted, how much money would each share receive?
            if ($values['bookVal'] > ($values['lastTradedPrice']) * 1.05)
            {
                echo "<li class='fact'>" . $symbol . "'s book value is higher than its current price. That means that it the company bankrupted, each share would receive " .
                    "<strong>$" . $values['bookVal'] . "</strong> while the current price is " . $values['lastTradedPrice'];
            }
        ?>
    </ul>
</div>