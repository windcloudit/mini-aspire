@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Repayment list') }}</div>
                <div class="card-body">
                   <div id="alert_info" class="alert" role="alert">
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalOriginalAmount = 0 @endphp
                                @php $totalInterestAmount = 0 @endphp
                                @php $totalAmount = 0 @endphp
                                @foreach($data as $item)
                                    @php $totalOriginalAmount += $item['original_amount'] @endphp
                                    @php $totalInterestAmount += $item['interest_amount'] @endphp
                                    @php $totalAmount += $item['total_amount'] @endphp
                                    <tr>
                                        <th scope='row'>{!! $item['week'] !!}</th>
                                        <td>{!! $item['repayment_due_date'] !!}</td>
                                        <td>${!! number_format($item['original_amount'], 2) !!}</td>
                                        <td>${!! number_format($item['interest_amount'], 2) !!}</td>
                                        <td>${!! number_format($item['total_amount'], 2) !!}</td>
                                        <td>${!! number_format($item['outstanding_balance'], 2) !!}</td>
                                        <td>
                                        @if($item['status'] === 0)
                                           <button type="button" class="btn btn-secondary" disabled>Done</button>
                                        @elseif(Illuminate\Support\Carbon::now()->gte(Illuminate\Support\Carbon::parse($item['repayment_due_date'])))
                                           <button type="button" class="btn btn-primary" onclick="repaySubmit({!! $item['id'] !!})">Repay</button>
                                        @else
                                           <button type="button" class="btn btn-warning" disabled>Not yet</button>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class='thead-dark-footer'>
                                    <td colspan='2'>Total</td>
                                    <td>${!! number_format($totalOriginalAmount, 2) !!}</td>
                                    <td>${!! number_format($totalInterestAmount, 2) !!}</td>
                                    <td colspan='3'>${!! number_format($totalAmount, 2) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
