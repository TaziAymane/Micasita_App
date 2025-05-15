@extends('layouts.app')
@section('titel')
    Show
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">Menu Item</h1>
                    </div>

                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <h5 class="mb-1 text-muted">ID</h5>
                                <p class="mb-0 fs-5"><b>{{ $item->id }}</b></p>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Image</h5>
                                    <p class="mb-0 fs-5">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="bg-primary bg-opacity-10 rounded-circle overflow-hidden"
                                            style="width: 80px; height: 80px;">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="item image"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>
                                    </div>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Name</h5>
                                    <p class="mb-0 fs-5"><b>{{ $item->categorie_name }} min</b></p>
                                </div>

                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Time Take</h5>
                                    <p class="mb-0 fs-5">
                                        <p class="mb-0 fs-5"><b>{{ $item->time_take }}min</b></p>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Created at   </h5>
                                    <p class="mb-0 fs-5"><b>{{ $item->created_at }}</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light">
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
