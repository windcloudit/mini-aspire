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
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxStart(function() {
    handleLoading(true);
});

$(document).ajaxStop(function() {
    handleLoading(false);
});


const formatNumber = (number) => {
    return Number(number).toLocaleString('en-US', {style:'currency', currency:'USD'});
};

$("#button_check").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "loan/check",
        data: {
            interest_rate: $("#interest_rate").val(),
            loan_term: $("#loan_term").val(),
            amount: $("#amount").val(),
        },
        success: function(data) {
            let totalOriginalAmount = 0;
            let totalInterestAmount = 0;
            let outstandingBalance = 0;
            let content = data.map(item => {
                totalOriginalAmount+=item.original_amount;
                totalInterestAmount+=item.interest_amount;
                outstandingBalance+=item.total_amount;
                return "<tr><th scope='row'>"+ item.week +"</th><td>"+ item.repayment_due_date +"</td><td>"+ formatNumber(item.original_amount) +"</td><td>"+ formatNumber(item.interest_amount) +"</td><td>"+ formatNumber(item.total_amount) +"</td><td>"+ formatNumber(item.outstanding_balance) +"</td></tr>"
                });
            content+= "<tr class='thead-dark-footer'><td colspan='2'>Total</td><td>"+ formatNumber(totalOriginalAmount) +"</td><td>"+ formatNumber(totalInterestAmount) +"</td><td colspan='2'>"+ formatNumber(outstandingBalance) +"</td></tr>"

            $("#table_repayment_list tbody").empty().append(content);
        },
        error: function(result) {
            console.log('error', result);
        }
    });
});


$("#button_submit").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "loan/submit",
        data: {
            interest_rate: $("#interest_rate").val(),
            loan_term: $("#loan_term").val(),
            amount: $("#amount").val(),
        },
        success: function() {
            window.location.replace("/repayments");
        },
        error: function(result) {
            console.log('error', result);
        }
    });
});

