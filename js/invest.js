/*
    InvestBit - Bitcamp 2015
    April 10-12, 2015
    
    Brian Chen
    Nick Walsh
    Brian Yang
 */
$('#stocks-page').hide();
$('#analysts-page').hide();

$('#stocks-button').on("click", function() {
    $('#start').hide();
    $('#stocks-page').show();
});
$('#analysts-button').on("click", function() {
    $('#start').hide();
    $('#analysts-page').show();

});
$("#tickerForm").on("submit", function (e) {
    console.log("Ticker form");
    submitResult("#tickerForm", "stockSearch.php", e);
});

//AJAX request for analyst search
$("#analystForm").submit(function (e) {
    submitResult("#analystForm", "analystSearch.php", e);
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
