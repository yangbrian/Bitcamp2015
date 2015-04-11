<!DOCTYPE html>
<html>
<head>
	<title>Sallie Bae - Bitcamp 2015</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <strong>Welcome to Sallie Bae - enter a stock below!</strong>
    <form id="tickerForm" action="stockSearch.php" method="get">
        <div id="stockSearch">Ticker Symbol: </div>
        <input type="text" name="ticker">
        <input type="submit" value="Search!">
    </form>
    <div id="resultBox"></div>
    <script>
        console.log('boop');
        $("#tickerForm").submit(function() {
            var url = "stockSearch.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $("#tickerForm").serialize(),
                success: function(data) {
                    $("#resultBox").innerHTML = 'hi';
                    console.log(data);
                }
            });
            return false;
        });
    </script>
</body>
</html>
