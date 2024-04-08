@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('follower.index') }}" class="btn btn-primary">Go to List</a><br>
                    
                    @foreach($followerDetails as $followerDetail)
                        @php
                            $twubric = unserialize($followerDetail->twubric);
                        @endphp
                    <div style="margin: 10px;">
                        @if ($followerDetail)
                            <p>UID: {{ $followerDetail->uid }}</p>
                            <p>Username: {{ $followerDetail->username }}</p>
                            <p>Fullname: {{ $followerDetail->fullname }}</p>
                            <h3>Twubric</h3>
                            <ul>
                                <li>Total: {{ $twubric['total'] }}</li>
                                <li>Friends: {{ $twubric['friends'] }}</li>
                                <li>Influence: {{ $twubric['influence'] }}</li>
                                <li>Chirpiness: {{ $twubric['chirpiness'] }}</li>
                            </ul>
                        @else
                            No follower details found.
                        @endif
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
