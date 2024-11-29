@extends('admin.layouts.app')

@section('admin_content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">

            {{-- session message --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="card">
                <div class="card-header d-flex justify-content-between ">
                    <h3 class="card-title">Blog</h3>
                    <a href="{{ route('blog.add_new') }}" class="btn btn-sm btn-primary"> <i class="fe fe-plus"></i>Add New
                        Blog</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">SL</th>
                                    <th class="wd-15p border-bottom-0">Title</th>
                                    {{-- <th class="wd-15p border-bottom-0">Description</th> --}}
                                    <th class="wd-20p border-bottom-0">Slug</th>
                                    <th class="wd-15p border-bottom-0">keyword</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> {{ Str::limit($blog->title, 10) }}</td>
                                        {{-- <td>{{ $blog->description }}</td> --}}
                                        <td>{{ $blog->slug }}</td>
                                        <td>{{ $blog->keyword }}</td>

                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-success"> <i
                                                    class="fe fe-edit"></i>Edit</a>
                                            <button onclick="handleDelete({{ $blog }})"
                                                class="btn btn-sm btn-danger"><i class="fe fe-trash"></i>Delete</button>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@section('js_script')
    <script>
        const handleDelete = (blog) => {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }, function(res) {
                if (res) {
                    window.location.href = "/admin/blog/delete/" + blog.id;
                }

            });

        }
    </script>
@endsection
