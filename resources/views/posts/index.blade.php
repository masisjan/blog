@extends('layouts.main')
@section('title', 'Post App | All posts')
@section('content')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Posts</h2>
                                <div class="ml-auto">
{{--                                    <a href=" {{ route('posts.create') }} " class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('posts._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Text</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count())
                                    @foreach($posts as $index => $post)
                                        <tr>
                                            <th scope="row"> {{ $index + 1 }} </th>
                                            <th scope="row"> {{ $index + $posts->firstItem() }} </th>
                                            <td> {{ $post->title }} </td>
                                            <td> {{ $post->text }} </td>
                                            <td> {{ $post->email }} </td>
                                            <td> {{ $post->category->name }} </td>
                                            <td width="150">
                                                <a href="{{ route('posts.show' , [$post->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                                @auth
                                                <a href="{{ route('contacts.edit', $post->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('contacts.destroy', $post->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach
                                    <form id="form-delete" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                                </tbody>
                            </table>

                            {{ $posts->appends(request()->only('category_id'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
