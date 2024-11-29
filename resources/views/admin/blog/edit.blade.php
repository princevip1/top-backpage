@extends('admin.layouts.app')

@section('head')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
@endsection

@section('admin_content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between ">
                    <h3 class="card-title">Edit Blog</h3>
                    {{-- <a href="" class="btn btn-sm btn-primary"> <i class="fe fe-plus"></i>Add New Blog</a> --}}
                </div>

                <div class="card-body">
                    <form action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data" id="identifier">
                        @csrf
                        <input value="{{ $blog->id }}" type="hidden" id="id" name="id"
                            class="form-control">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Title </label>
                                    <input value="{{ $blog->title }}" type="text" id="title" name="title"
                                        class="form-control" placeholder="Type here">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Keyword </label>
                                    <input value="{{ $blog->keyword }}" type="text" id="keyword" name="keyword"
                                        class="form-control" placeholder="Type here">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Slug </label>
                                    <input value="{{ $blog->slug }}" type="text" id="slug" name="slug"
                                        class="form-control" placeholder="Type here">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 mb-3">
                                <label class="form-label">Image </label>
                                <input type="file" name="image" class="dropify" data-bs-height="180" />
                            </div>



                            <div class="col-md-12">
                                <label for="description">Description</label>

                                <textarea class="ckeditor form-control" name="description">
                                    {!! $blog->description !!} 
                                </textarea>

                            </div>
                            <div class="col-md-12" style="margin-top:100px">
                                <button class="btn btn-primary mt-3" type="submit"> <i class="fe fe-save"></i>Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@section('js_script')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
