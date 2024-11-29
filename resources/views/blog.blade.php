@extends('partials.headers.private')

<style>
    .list {
        list-style: disc !important;
        padding: 0;
        margin: 0;
        margin-left: 20px !important;

    }

    .list-item {
        margin-bottom: 15px !important;
    }

    .blog-list {
        display: grid;
        grid-template-columns: repeat(6, 1fr) !important;
        grid-gap: 10px;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .blog-list {
            display: grid !important;
            grid-template-columns: repeat(1, 1fr) !important;
            grid-gap: 10px !important;
        }
    }

 
 

    .blog-item {
        border-radius: 6px;
        float: left;
        color: #696969;
        margin: 5px;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }

    .blog-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 6px 6px 0 0;
    }
</style>

@section('private_content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Disclaimer</h1>
                </div>

            </div>
        </div>
    </div>

    <div id="mainCellWrapper" style="padding: 0px 5px;">
        <nav aria-label="breadcrumb" class="bg-light">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Home</a></li>

            </ol>
        </nav>


        <div class="blog-list">
            @foreach ($blogs as $blog)
                <a href="{{ route('publicBlogDetails', $blog->id) }}">
                    <div class="blog-item ">
                        <img src="{{ $blog->image }}" alt="">
                        <div style="padding:10px;">
                            <p class="text-primary" style="font-weight:500; ">{{ Str::limit($blog->title, 40) }} </p>
                            <span style="font-weight:100; font-size:10px">{{ $blog->updated_at->format('d M Y') }}</span>
                            <p style="font-weight:200">{{ Str::limit(strip_tags($blog->description), 90) }} </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>



    </div>
    <br />
    @include('partials.common.footer')
@endsection('private_content')
