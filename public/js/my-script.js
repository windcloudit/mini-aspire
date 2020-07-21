$(window).on('load',function(){
    $('.modal').modal('hide');
});

$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});

const handleLoading = (show) => {
    if (show) {
        $('.modal').modal('show');
    } else {
        $('.modal').modal('hide');
    }
}

const formatNumber = (number) => {
    return Number(number).toLocaleString('en-US', {style:'currency', currency:'USD'});
};

$("#button_check").click(function(e) {
    e.preventDefault();
    console.log('click button check')
    handleLoading(true);
    $.ajax({
        type: "GET",
        url: "/check",
        data: {
            interest_rate: $("#interest_rate").val(),
            loan_term: $("#loan_term").val(),
            amount: $("#amount").val(),
        },
        success: function(data) {
            handleLoading(false);
            console.log('data', data);

            const content = data.map(item => {
                return "<tr><th scope='row'>"+ item.week +"</th><td>"+ item.repayment_due_date +"</td><td>"+ formatNumber(item.original_amount) +"</td><td>"+ formatNumber(item.interest_amount) +"</td><td>"+ formatNumber(item.total_amount) +"</td><td>"+ formatNumber(item.outstanding_balance) +"</td></tr>"
                });
            $("#table_repayment_list tbody").empty().append(content);
        },
        error: function(result) {
            handleLoading(false);
            console.log('error', result);
        }
    });
});
