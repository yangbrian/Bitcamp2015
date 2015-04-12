/*
    InvestBit - Bitcamp 2015
    April 10-12, 2015
    
    Brian Chen
    Nicholas Walsh
    Brian Yang
 */
$('#stocks-page').hide();
$('#analysts-page').hide();

$('#stocks-button').on("click", function() {
    $('#start').hide();
    $('#stocks-page').show();
    $('#welcome-msg').html("Enter an stock symbol to begin.");
});
$('#analysts-button').on("click", function() {
    $('#start').hide();
    $('#analysts-page').show();
    $('#welcome-msg').html("Enter an analyst's name to begin.");

});
$("#tickerForm").on("submit", function (e) {
    console.log("Ticker form");
    submitResult("#tickerForm", "stockSearch.php", e);
});
$("#analystsForm").on("submit", function (e) {
    console.log("Analyst form");
    submitResult("#analystsForm", "analystSearch.php", e);
});

function submitResult(selector, file, e) {
   
    e.preventDefault();
    console.log(selector + " selected.");
    $.ajax({
        type: "POST",
        url: file,
        data: $(selector).serialize(),
        success: function (data) {
            //$(selector).reset();
            $(selector + '-' + 'resultBox').html(data);

        }
    });
}
