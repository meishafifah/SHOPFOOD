@extends('templates.master')
@section('content')
    <div class="container py-5">
        <form action=" {{ route('menu.update', $menu->id) }} " method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input menu name" value="{{ $menu->name }}">
                @error('name')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Input menu description">{{ $menu->description }}</textarea>
                @error('description')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Input menu price" value="{{ $menu->price }}">
                @error('price')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" class="form-control" name="picture" id="picture" placeholder="Input menu picture">
                @error('picture')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-kenyang" type="submit">Submit</button>
        </form>
    </div>
@endsection