@extends('layouts.Admin')

@section('titel')
    users
@endsection
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 fw-bold text-primary">
                All Useres 
            </h1>
            {{-- <a href="{{ route('user.create') }}" class="btn btn-success">
                Add New Categorie
            </a> --}}
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom-0 py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search users..."
                                aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                        <span class="text-muted">
                            Showing {{ $users->firstItem() }}-{{ $users->lastItem() }} of {{ $users->total() }}
                            users
                        </span>
                    </div>
                </div>
            </div>

            {{-- <h2>Total useres : {{$countusers}}</h2> --}}
            <div class="table-responsive">

                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="w-5">ID</th>
                            <th scope="col">Nom Complait</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Adress</th>
                            <th scope="col" class="text-center">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fw-bold">{{ $user->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">
                                            {{ $user->nomComplait }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-decoration-none">
                                    {{ $user->tele }}  
                                </td>
                                <td class="text-decoration-none">
                                    {{ $user->adress }}  
                                </td>
                              
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary">
                                            Show
                                        </a>
                                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-success">update</a>
                                        
                                        <form action="{{ route('user.destroy',$user->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return alert('are you shour you want to delete {{$user->nomComplait}}')">
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
                    {{ $users->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>
@endsection
