@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Resume Subscription') }}</div>

    <div class="card-body">
        <form action="{{route('account.subscriptions.resume')}}" method="post">
            @csrf

            <button type="submit" class="btn btn-danger">Resume Subscription</button>
        </form>
    </div>
</div>

@endsection
