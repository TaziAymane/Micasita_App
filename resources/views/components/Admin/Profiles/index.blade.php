@extends('layouts.Admin')

@section('titel')
    profiles
@endsection
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 fw-bold text-primary">
                All Useres 
            </h1>
            {{-- <a href="{{ route('profile.create') }}" class="btn btn-success">
                Add New Categorie
            </a> --}}
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom-0 py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search profiles..."
                                aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                        <span class="text-muted">
                            Showing {{ $profiles->firstItem() }}-{{ $profiles->lastItem() }} of {{ $profiles->total() }}
                            profiles
                        </span>
                    </div>
                </div>
            </div>

            {{-- <h2>Total useres : {{$countProfiles}}</h2> --}}
            <div class="table-responsive">

                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="w-5">ID</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Phone number</th>
                            <th scope="col" class="text">Commande</th>
                            <th scope="col" class="text">Table reservation</th>
                            <th scope="col" class="text-center">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td class="fw-bold">{{ $profile->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">
                                            {{ $profile->username }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-decoration-none">
                                    {{ $profile->phone }}  
                                </td>
                                <td>
                                    product1
                                </td>
                                <td>
                                    table2 7h->8h
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-sm btn-primary">
                                            Show
                                        </a>
                                        <a href="{{route('profile.edit',$profile->id)}}" class="btn btn-sm btn-success">update</a>
                                        
                                        <form action="{{ route('profile.destroy',$profile->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return alert('are you shour you want to delete {{$profile->name}}')">
                                                delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="card-footer bg-white border-top-0 py-3">
                <nav aria-label="Page navigation">
                    {{ $profiles->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>
@endsection
