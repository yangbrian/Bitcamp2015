<?php
/**
 * Created by IntelliJ IDEA.
 * User: Brian
 * Date: 4/11/2015
 * Time: 4:51 AM
 */
$symbol = strtoupper($_GET['ticker']);

$test = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=AAPL&f=xop");
$csv = str_getcsv($test);
$values = array('test' => $csv[0], 'test1' => $csv[1]);
$test = json_encode($values);
?>


<div>
    Stock information for: <strong><?php echo($symbol) ?></strong>
</div>
<table id="values">
    <tr class="valueRow">
        <td class="valueName">
            <?php echo($csv[0])?>
        </td>
        <td class="value">

        </td>
    </tr>
</table>