@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text input-title" id="document_date">Document Date</span>
                        </div>
                        <input type="text" class="form-control" value="{{Illuminate\Support\Carbon::now()->format('Y-m-d')}}" aria-label="document_date" aria-describedby="basic-addon1" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text input-title" id="amount_label">Amount</span>
                        </div>
                        <input type="number" id="amount" class="form-control" min="1" step="1" placeholder="1000" value="1000" aria-label="amount" aria-describedby="amount" name="amount">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text input-title" id="interest_rate_label">Interest Rate</span>
                        </div>
                        <input type="number" id="interest_rate" class="form-control" min="1" step="0.01" placeholder="0.01" value="0.01" aria-label="interest_rate" aria-describedby="interest_rate" name="interest_rate">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text input-title" id="loan_term_label">Loan Term</span>
                        </div>
                        <input type="number" id="loan_term" class="form-control" min="1" step="1" placeholder="10" value="10" aria-label="loan_term" aria-describedby="loan_term" name="loan_term">
                        <div class="input-group-append">
                            <span class="input-group-text">week(s)</span>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <button type="button" class="btn btn-info" id="button_check">Check</button>
                            </div>
                            <div class="col-md-auto">
                                <button type="button" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="repayment-check-list" id="repayment_check_list">
                        <table class="table table-striped" id="table_repayment_list">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Week</th>
                                    <th scope="col">Due date</th>
                                    <th scope="col">Original amount</th>
                                    <th scope="col">Interest amount</th>
                                    <th scope="col">Total amount</th>
                                    <th scope="col">Outstanding balance</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
