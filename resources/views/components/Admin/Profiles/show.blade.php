@extends('layouts.Admin')
@section('titel')
    Show
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">{{$profile->username}} , Profile</h1>
                    </div>

                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-profile">
                                <h5 class="mb-1 text-muted">ID</h5>
                                <p class="mb-0 fs-5"><b>{{ $profile->id }}</b></p>
                            </div>
                            <div class="list-group list-group-flush">
                                

                                <div class="list-group-profile">
                                    <h5 class="mb-1 text-muted">Username </h5>
                                    <p class="mb-0 fs-5"><b>{{ $profile->username }}</b></p>
                                </div>

                                <div class="list-group-profile">
                                    <h5 class="mb-1 text-muted">Phone namber </h5>
                                    <p class="mb-0 fs-5">
                                        <p class="mb-0 fs-5"><b>{{ $profile->phone }}</b></p>
                                    </p>
                                </div>
                                <div class="list-group-profile">
                                    <h5 class="mb-1 text-muted">Created at   </h5>
                                    <p class="mb-0 fs-5"><b>{{ $profile->created_at }}</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light">
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
