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
                        <h1 class="h4 mb-0">{{$user->nomComplait}} , user</h1>
                    </div>

                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-user">
                                <h5 class="mb-1 text-muted">ID</h5>
                                <p class="mb-0 fs-5"><b>{{ $user->id }}</b></p>
                            </div>
                            <div class="list-group list-group-flush">
                                

                                <div class="list-group-user">
                                    <h5 class="mb-1 text-muted">Nom Complait </h5>
                                    <p class="mb-0 fs-5"><b>{{ $user->nomComplait }}</b></p>
                                </div>

                                <div class="list-group-user">
                                    <h5 class="mb-1 text-muted">Telephone </h5>
                                    <p class="mb-0 fs-5">
                                        <p class="mb-0 fs-5"><b>{{ $user->tele }}</b></p>
                                    </p>
                                </div>
                                 <div class="list-group-user">
                                    <h5 class="mb-1 text-muted">Adress </h5>
                                    <p class="mb-0 fs-5">
                                        <p class="mb-0 fs-5"><b>{{ $user->adress }}</b></p>
                                    </p>
                                </div>
                                <div class="list-group-user">
                                    <h5 class="mb-1 text-muted">Created at   </h5>
                                    <p class="mb-0 fs-5"><b>{{ $user->created_at }}</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
