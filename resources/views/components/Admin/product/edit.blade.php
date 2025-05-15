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
                        <h2 class="h4 text-center mb-0">Update item </h2>
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
                            action="{{ route('product.update', $item->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Name
                                </label>
                                <input type="text" class="form-control form-control-lg" name="product_name"
                                    value="{{ old('product_name', $item->product_name) }}">
                            </div>

                            <!-- Time Take -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Price
                                </label>
                                <input type="text" class="form-control" name="price" value="{{ old('price', $item->price) }}" />
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Image
                                </label>
                                @if ($item->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Current image"
                                            style="max-height: 200px;">
                                        <p class="text-muted small mt-1">Current Image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control form-control-lg" name="image">
                                <small class="text-muted">Leave empty to keep current image</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Update
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary btn-lg">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
