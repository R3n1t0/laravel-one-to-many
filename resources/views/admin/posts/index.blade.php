@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista POSTs</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Contenuto</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post -> id}}</td>
                    <td>{{ $post -> title}}</td>
                    <td>{{ $post -> content}}</td>
                    <td>
                        <div class="buttons d-flex">
                            <a class="btn btn-info" href="{{ route('admin.post.show', $post)}}">MOSTRA</a>
                            <a class="btn btn-warning mx-1" href="{{ route('admin.post.edit', $post)}}">MODIFICA</a>
                            <form class="d-inline" action="{{ route('admin.post.destroy', $post)}}" method="POST" onsubmit="return confirm('Confermi di cancellare il post: {{$post -> title}}')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">CANCELLA</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $posts->links()}}
</div>
@endsection
