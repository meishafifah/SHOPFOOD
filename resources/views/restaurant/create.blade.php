@extends('templates.master')
@section('content')
    <div class="container py-5">
        <form action=" {{ route('restaurant.store') }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input restaurant name">
                @error('name')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Input restaurant description"></textarea>
                @error('description')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" step="0.01" class="form-control" name="rating" id="rating" placeholder="Input restaurant rating">
                @error('rating')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="promo">Banyak Promo</option>
                    <option value="populer">Toko Ter-Populer</option>
                    <option value="rekomendasi">Rekomendasi</option>
                </select>
                @error('category')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" class="form-control" name="picture" id="picture" placeholder="Input restaurant picture">
                @error('picture')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-kenyang" type="submit">Submit</button>
        </form>
    </div>
@endsection