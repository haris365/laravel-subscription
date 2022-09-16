@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Invoices') }}</div>

    <div class="card-body">
        <div>
       
            @foreach ($invoices as $invoice )
                <li>
                    {{$invoice->date()->toFormattedDateString()}}
                    {{$invoice->total}}
                    <a href="{{route('account.subscriptions.invoice' , $invoice->id)}}">Download </a>
                </li>
                
            @endforeach
        </div>
    </div>
</div>

@endsection
