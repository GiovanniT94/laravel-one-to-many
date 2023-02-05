@extends('layouts.app')

 @section('content')
    <div class="container">
        @if (session('success_delete'))
            <div class="alert alert-warning" role="alert">
                Il categoria {{ session('success_delete')->name }} è stato eliminata correttamente.
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->slug }}</td>
                        <td>{{ $categoria->name }}</td>

                        <td>
                            <a href="{{ route('admin.categories.show', ['categoria' => $categoria]) }}" class="btn btn-primary">Visita</a>
                            <a href="{{ route('admin.categories.edit', ['categoria' => $categoria]) }}" class="btn btn-warning">Edita</a>
                            <form action="{{ route('admin.categories.destroy', ['categoria' => $categoria]) }}" method="categoria">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-delete-me">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>


 @endsection
