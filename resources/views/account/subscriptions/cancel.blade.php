@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Cancel Subscription') }}</div>

    <div class="card-body">
        <form action="{{route('account.subscriptions.cancel')}}" method="post">
            @csrf

            <button type="submit" class="btn btn-danger">Cancel Subscription</button>
        </form>
    </div>
</div>

@endsection
