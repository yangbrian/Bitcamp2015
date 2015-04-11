<!DOCTYPE html>
<html>
<head>
	<title>Sallie Bae - Bitcamp 2015</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <div id="body">
        <div id="header">
            Welcome to Sallie Bae - enter a stock below!
        </div>
        <div class="floatLeft">
            <form id="tickerForm" action="">
                <div id="stockSearch">Ticker Symbol: </div>
                <input class="upperCase" type="text" name="ticker"/>
                <input type="submit" value="Search!"/>
            </form>
        </div>
        <div class="floatRight">
            <form id="analystForm" action="">
                <div id="analystSearch">Analyst Name: </div>
                <input type="text" name="name"/>
                <input type="submit" value="Search!/">
            </form>
        </div>
        <div class="clear"></div>
        <div id="resultBox"></div>
    </div>
    <script>
        //AJAX request for stock search
        $("#tickerForm").submit(function() {
            var url = "stockSearch.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $('#tickerForm').serialize(),
                success: function(data) {
                    document.getElementById("analystForm").reset();
                    $("#resultBox").html(data);
                }
            });
            event.preventDefault();
        });
        //AJAX request for analyst search
        $("#analystForm").submit(function() {
            var url = "analystSearch.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $('#analystForm').serialize(),
                success: function(data) {
                    document.getElementById("tickerForm").reset();
                    $("#resultBox").html(data);
                }
            });
            event.preventDefault();
        });
    </script>
</body>
</html>
