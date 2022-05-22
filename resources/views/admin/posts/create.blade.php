@extends('layouts.admin')

@section('pageTitle', 'New Post')

@section('pageMain')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="POST" action="{{ route('admin.posts.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                        <button type="button" class="btn btn-primary slug_btn">Generate slug</button>
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row text-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="my-4"><a class="text-decoration-none" href="{{ route('admin.posts.index') }}">Comics List</a>
            </h3>
        </div>
    </div>
@endsection
