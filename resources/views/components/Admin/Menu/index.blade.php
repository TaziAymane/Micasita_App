@extends('layouts.Admin')

@section('titel')
    menus
@endsection
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 fw-bold text-primary">
                All Menu 
            </h1>
            <a href="{{ route('menu.create') }}" class="btn btn-success">
                Add New Categorie
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom-0 py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search menus..."
                                aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                        <span class="text-muted">
                            Showing {{ $menus->firstItem() }}-{{ $menus->lastItem() }} of {{ $menus->total() }}
                            menus
                        </span>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="w-5">#ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Time Take</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td class="fw-bold">{{ $menu->id }}</td>
                                
                                <td>
                                    <div class="flex-shrink-0 me-2">
                                        <div class="bg-primary bg-opacity-10 rounded-circle overflow-hidden"
                                            style="width: 36px; height: 36px;">
                                            <img src="{{ asset('storage/'.$menu->image) }}"
                                                alt="menu image" class="w-100 h-100 object-fit-cover">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1">
                                            {{ $menu->categorie_name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-decoration-none">
                                    {{ $menu->time_take }} min 
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-sm btn-primary">
                                            Show
                                        </a>
                                        <form action="{{ route('menu.edit',$menu->id)}}" method="get">
                                            @csrf
                                            <button class="btn btn-sm btn-secondary">
                                                update
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('menu.destroy',$menu->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return alert('are you shour you want to delete {{$menu->name}}')">
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
                    {{ $menus->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>
@endsection
