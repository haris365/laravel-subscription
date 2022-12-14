@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Apply Coupon') }}</div>

    <div class="card-body">
        <form action="{{route('account.subscriptions.coupon')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="coupon">Coupon</label>
                <input type="text" id="coupon" name="coupon" class="form-control @error('coupon') is-invalid @enderror" placeholder="Please enter coupon code...."></input>
                @error('coupon')
                    <span class="invalid-feedback" role="alert">

                        <strong>{{$message}}</strong>

                    </span>

                @enderror

            </div>

          

            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>
</div>

@endsection
