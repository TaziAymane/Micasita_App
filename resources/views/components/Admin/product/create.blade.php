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
                        <h2 class="h4 text-center mb-0">Create New Product</h2>
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
                        <form class="needs-validation" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Product Name
                                </label>
                                <input type="text" class="form-control form-control-lg" name="product_name"/>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Price
                                </label>
                                 <input type="text" class="form-control form-control-lg" name="price"/>
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Image
                                </label>
                                <input type="file" class="form-control form-control-lg" name="image" />
                            </div>   
                            {{-- Categorie select --}}
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Categorie
                                </label>
                                <select class="form-select" name="categorie">
                                   @foreach ($categories as $categorie)
                                       <option value="{{$categorie->categorie_name}}">{{$categorie->categorie_name}}</option>
                                   @endforeach
                                </select>
                            </div>   
                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Create 
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