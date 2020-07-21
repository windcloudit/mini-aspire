$(window).on('load',function(){
    $('.modal').modal('hide');
});

$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});

$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-danger").slideUp(500);
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

const showAlert = (id, message, isSuccess = true) => {
    const classList = isSuccess ? 'alert alert-success' : 'alert alert-danger';
    $('#' + id).removeClass().addClass(classList).empty().append(message).css('display', "block").fadeTo(2000, 500).slideUp(500, function(){
        $('#' + id).slideUp(500);
    });
}

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
            document_date: $("#document_date").val(),
            loan_term: $("#loan_term").val(),
            amount: $("#amount").val(),
        },
        success: function(data) {
            let totalOriginalAmount = 0;
            let totalInterestAmount = 0;
            let totalAmount = 0;
            let content = data.map(item => {
                totalOriginalAmount+=item.original_amount;
                totalInterestAmount+=item.interest_amount;
                totalAmount+=item.total_amount;
                return "<tr><th scope='row'>"+ item.week +"</th><td>"+ item.repayment_due_date +"</td><td>"+ formatNumber(item.original_amount) +"</td><td>"+ formatNumber(item.interest_amount) +"</td><td>"+ formatNumber(item.total_amount) +"</td><td>"+ formatNumber(item.outstanding_balance) +"</td></tr>"
                });
            content+= "<tr class='thead-dark-footer'><td colspan='2'>Total</td><td>"+ formatNumber(totalOriginalAmount) +"</td><td>"+ formatNumber(totalInterestAmount) +"</td><td colspan='2'>"+ formatNumber(totalAmount) +"</td></tr>"

            $("#table_repayment_list tbody").empty().append(content);
        },
        error: function(result) {
            console.log('error', result);
        }
    });
});


$("#button_submit").click(function(e) {
    e.preventDefault();
    if (!confirm('Are you sure submit?')) return;
    $.ajax({
        type: "POST",
        url: "loan/submit",
        data: {
            interest_rate: $("#interest_rate").val(),
            document_date: $("#document_date").val(),
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

/**
 * Function call api repay submit
 * @uathor: tat.pham
 *
 * @param id
 */
const repaySubmit = (id) => {
    if (!confirm('Do you want repay?')) return;
    $.ajax({
        type: "PUT",
        url: "repayments/" + id,
        success: function(data) {
            let totalOriginalAmount = 0;
            let totalInterestAmount = 0;
            let totalAmount = 0;
            let currentDate = new Date();
            let buttonContent = '';
            let content = data.map(item => {
                totalOriginalAmount+=item.original_amount;
                totalInterestAmount+=item.interest_amount;
                totalAmount+=item.total_amount;
                let dueDate = new Date(item.repayment_due_date);
                if (item.status === 0) {
                    buttonContent = "<button type='button' class='btn btn-secondary' disabled>Done</button>";
                } else if (currentDate >= dueDate) {
                    buttonContent = "<button type='button' class='btn btn-primary' onclick='repaySubmit(" + item.id +")'>Repay</button>";
                } else {
                    buttonContent = "<button type='button' class='btn btn-warning' disabled>Not yet</button>";
                }
                return "<tr><th scope='row'>"+ item.week +"</th><td>"+ item.repayment_due_date +"</td><td>"+ formatNumber(item.original_amount) +"</td><td>"+ formatNumber(item.interest_amount) +"</td><td>"+ formatNumber(item.total_amount) +"</td><td>"+ formatNumber(item.outstanding_balance) +"</td><td>"+ buttonContent +"</td></tr>"
            });
            content+= "<tr class='thead-dark-footer'><td colspan='2'>Total</td><td>"+ formatNumber(totalOriginalAmount) +"</td><td>"+ formatNumber(totalInterestAmount) +"</td><td colspan='3'>"+ formatNumber(totalAmount) +"</td></tr>"

            $("#table_repayment_list tbody").empty().append(content);

            // Show alert
            showAlert('alert_info', 'Repay is successful')
        },
        error: function(result) {
            showAlert('alert_info', result.responseJSON.message, false)
        }
    });
}

