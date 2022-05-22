@extends('layouts.admin')

@section('pageTitle', 'Index')

@section('pageMain')
    <div class="container text-center">
        <div class="row row-cols-4 g-4 py-5">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100" data-id="{{ $post->slug }}">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h2 class="card-title">
                                <a class="text-decoration-none"
                                    href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
                            <div class="row row-cols-3 justify-content-center">
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                                </div>
                                <div class="col" data-id="{{ $post->slug }}">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger del_btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Modal -->
            <section class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-dark">
                            Please confirm your choice
                        </div>
                        <div class="modal-footer">
                            <button type="button md_close_btn" class="btn btn-secondary "
                                data-bs-dismiss="modal">Close</button>
                            <form method="POST" data-base="{{ route('admin.posts.destroy', '***') }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
            </section>
        </div>
        {{ $posts->links() }}
        <h3 class="my-4"><a class="text-decoration-none" href="{{ route('admin.posts.create') }}">Add new
                post</a>
        </h3>
        <h3 class="my-4"><a class="text-decoration-none" href="{{ route('admin.home') }}">Home</a></h3>
    </div>
@endsection
