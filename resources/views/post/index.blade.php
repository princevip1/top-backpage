@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Ads</li>
                    </ol>
                </nav>

                @include('partials.common.bAlert')


                <div class="card">
                    <div class="card-header">{{ __('Manage My Ads') }}</div>

                    <div class="card-body">

                        @if ($posts->count() !== 0)
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $item)
                                        <tr>
                                            <td>
                                                <a target="_blank"
                                                    href="{{ route('single', ['state' => $item->city->state->slug, 'city' => $item->city->slug, 'category' => $item->category->slug, 'post' => $item->slug]) }}">

                                                    {{ $item->title }}
                                                </a>
                                            </td>
                                            <td>{{ $item->location === null ? $item->city->slug : $item->location }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('post.destroy', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $posts->links('pagination.default') }}
                        @else
                            <div class="px-4 py-5 my-5 text-center">
                                <h1 class="display-5 fw-bold">No Ads Yet</h1>
                                <div class="col-lg-6 mx-auto">
                                    <p class="lead mb-4">

                                        Sorry you have not posted any ads yet. Click the button below to post your
                                        first. Please follow our site rules and regulations to keep everybody safe.

                                    </p>
                                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                        <a href="{{ route('select-city') }}"
                                            class="btn btn-success btn-sm px-4 gap-3">Publish New Ad</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @include('partials.common.footer')

    </div>
@endsection
