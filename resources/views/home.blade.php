@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Followers</h1>
                    @foreach($followers as $follower)
                        
                        <a href="{{ route('follower.show', ['id' => $follower->uid]) }}">{{$follower->username}}</a><br>
                        
                    @endforeach
                    {{ $followers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
