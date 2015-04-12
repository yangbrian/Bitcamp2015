<!DOCTYPE html>
<html>
<head>
    <title>InvestBit</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
<header id="header">

    <h1><img src="images/InvestBit.png" alt="InvestBit" title="InvestBit" /></h1>

</header>

<section id="welcome">
    <div class="container">
        <div class="button" id="home-link">Home</div>
        <p id="welcome-msg">Welcome to InvestBit! Please choose an option below to begin.</p>
        <div class="button" id="other-link">Other</div>
    </div>
</section>

<div id="start">
    <div class="left">
        <button class="button" id="stocks-button">Stocks</button>
    </div>
    <div class="right">
        <button class="button" id="analysts-button">Analysts</button>
    </div>
</div>

<div id="stocks-page">
    <form id="tickerForm">
        <label for="ticker">Ticker Symbol: </label>
        <input placeholder="AAPL" class="upperCase" type="text" name="ticker" />
        <input class="button" type="submit" value="Search!" />
    </form>
    <div id="tickerForm-resultBox"></div>
</div>

<div id="analysts-page">
    <form id="analystsForm">
        <label for="analyst">Analyst Name: </label>
        <input placeholder="John Smith" type="text" name="analyst" />
        <input class="button" type="submit" value="Search!" />
    </form>
    <div id="analystsForm-resultBox"></div>

    <h3>Meta Ratings Explained</h3>
    <img src="images/Meta-Rating-with-Percentiles.png" />
    <h3>Ranking System Explained</h3>
    <img src="images/Ranking-System-Explanation.png" />
    <h3>Income Distribution</h3>
    <img src="images/Income-Distribution.png" />
    <h3>Infographic</h3>
    <img width="800" style="margin-bottom: 150px;" src="images/BitCamp-Infographic-For-Web.png" />
</div>



<footer id="footer">
    <p>Created by Brian Chen, Nicholas Walsh, and Brian Yang
        <br/>at Bitcamp 2015 (Apr. 10-12)</p>
</footer>

<script type="text/javascript" src="js/invest.js"></script>
</body>

</html>
