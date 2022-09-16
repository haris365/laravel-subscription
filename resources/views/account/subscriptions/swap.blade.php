@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Swap Subscription') }}</div>

    <div class="card-body">     
        <form action="{{route('account.subscriptions.swap')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="plan"> Swap </label>
                <select name="plan" id="plan" class="form-control">
                    <option disabled selected>-- Please Select Plan --</option> 
                    @foreach ($plans as $plan )

                        <option value="{{$plan->slug}}">{{$plan->title}}</option>                
                    @endforeach
                </select>
                <br>

                <button class="btn btn-primary" type="submit">Swap</button>
               

            </div>


        </form>
    </div>
</div>

@endsection
