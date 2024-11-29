@extends('partials.headers.private')

<style>
    .list {
        list-style: disc !important;
        padding: 0;
        margin: 0;
        margin-left: 20px !important;

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
                <li class="breadcrumb-item"><a href="#">Publish on</a></li>
                <li class="breadcrumb-item"><a href="#"><span
                            style="font-weight:200">{{ $blog->updated_at->format('d M Y') }}</span></a></li>
            </ol>
        </nav>

        <img style="width:100%; height:400px " src="{{ $blog->image }}" alt="">

        <h1 class="fs-3 fw-bold my-3 text-primary">{{ $blog->title }}</h1>

        <p style="font-weight:200">{!! $blog->description !!} </p>




    </div>
    <br />
    @include('partials.common.footer')
@endsection('private_content')
