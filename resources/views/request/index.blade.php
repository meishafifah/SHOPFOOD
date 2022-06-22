@extends('templates.master')
@section('content')
    <div class="container">
        <br>
        <h1>Daftar Permintaan</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                <th scope="row">1</th>
                <td>{{ $request->name }}</td>
                <td>{{ $request->description }}</td>
                <td>{{ $request->category }}</td>
                <td>{{ $request->status }}</td>
                <td class="d-flex">
                    <form action="{{ route('request.approve', $request->id) }}" method="post">
                        @csrf
                        @method('put')
                            <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('request.decline', $request->id) }}" method="post">
                        @csrf
                        @method('put')
                            <button type="submit" class="btn btn-success">Decline</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection