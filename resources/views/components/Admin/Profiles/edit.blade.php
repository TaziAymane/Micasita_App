@extends('layouts.Admin')
@section('titel')
    update
@endsection
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="h4 text-center mb-0">Update {{$profile->name}} profile  </h2>
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
                        <form class="needs-validation" method="POST"
                            action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Name
                                </label>
                                <input type="text" class="form-control form-control-lg" name="name"
                                    value="{{ old('name', $profile->name) }}">
                            </div>

                            <!-- Time Take -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Phone
                                </label>
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone', $profile->phone) }}" />
                            </div>

                            

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Update
                                </button>
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary btn-lg">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
