@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Plans') }}</div>

                <div class="card-body">
                   
                        @forelse ($plans as $plan )
                        <div>
                        <a href="{{ route('subscriptions.store' , ['plan' => $plan->slug]) }}">{{$plan->title}}</a>
                        </div>
                        @empty
                            Sorry! No plan Available.
                            
                        @endforelse

                              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
