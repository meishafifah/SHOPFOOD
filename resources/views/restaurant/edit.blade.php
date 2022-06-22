@extends('templates.master')
@section('content')
    <div class="container py-5">
        <form action=" {{ route('restaurant.update', $restaurant->slug) }} " method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Input your User ID" value="{{ $restaurant->name }}">
                @error('user_id')
                    <p class="text-danger small"> {{$message}} </p>
                @enderror   
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input your restaurant name" value="{{ $restaurant->name }}">
                @error('name')
                    <p class="text-danger small"> {{$message}} </p>
                @enderror   
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Input your restaurant description"> {{ $restaurant->description }} </textarea>
                @error('description')
                    <p class="text-danger small"> {{$message}} </p>
                @enderror 
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input class="form-control" name="rating" id="rating" placeholder="Input your restaurant rating" value="{{ $restaurant->rating }}">
                @error('rating')
                    <p class="text-danger small"> {{$message}} </p>
                @enderror 
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category" id="category">
                    <option {{ $restaurant->category == "promo" ? 'selected' : '' }} value="promo">Banyak Promo</option>
                    <option {{ $restaurant->category == "populer" ? 'selected' : '' }} value="populer">Toko Ter-Populer</option>
                    <option {{ $restaurant->category == "rekomendasi" ? 'selected' : '' }} value="rekomendasi">Rekomendasi</option>
                </select>
                @error('category')
                    <p class="text-danger small"> {{$message}} </p>
                @enderror 
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" class="form-control" name="picture" id="picture">
            </div>
            <button class="btn btn-kenyang" type="submit">Submit</button>
        </form>
    </div>
@endsection