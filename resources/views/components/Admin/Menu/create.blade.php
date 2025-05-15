@extends('layouts.Admin')
@section('title')
    create
@endsection

@section('content')
     <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="h4 text-center mb-0">Create New Menu Categorie</h2>
                    </div>
                    {{-- Form Errors Alert --}}
                    @if ($errors->any())
                        <x-alert type="warning">
                            <h3>Errors</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-alert>
                    @endif
                    {{-- End --}}

                    <div class="card-body px-4 py-3">
                        <form class="needs-validation" method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Categorie Name
                                </label>
                                <input type="text" class="form-control form-control-lg" name="categorie_name"
                                    value="{{ old('categorie_name') }}">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Time Take 
                                </label>
                                 <input type="text" class="form-control form-control-lg" name="time_take"
                                    value="{{ old('time_take') }}">
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Categorie Image
                                </label>
                                <input type="file" class="form-control form-control-lg" name="image">
                            </div>                         
                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Create 
                                </button>

                                <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-lg">Back</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection