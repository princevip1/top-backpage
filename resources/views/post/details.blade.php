@extends('partials.headers.private')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .postpath {
        padding: 4px;
        border: 1px solid #dbc06f;
        background-color: #f7f0dd;
        font-size: 16px;
        text-align: center;
        color: #198754;
        margin-bottom: 8px;
    }
</style>

@section('private_content')
    <div class="container">

        <nav aria-label="breadcrumb" class="bg-light">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('state', $city->state->slug) }}">{{ $city->state->name }}</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('city', [$city->state->slug, $city->slug]) }}">{{ $city->name }}</a></li>

                <li class="breadcrumb-item">{{ $category->name }}</li>
                <li class="breadcrumb-item active" aria-current="page">Make a Post</li>
            </ol>
        </nav>

        <p
            style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 18px;font-weight: 600;padding: 5px 5px;margin: 30px 0px;">
            Please make sure you are filling these information right, Because after you publish this ad, you wont be able to
            update any information. Although you will be able to delete the ad.</p>

        @include('partials.common.bAlert')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="postpath"> <b>{{ $city->state->name }}</b> » <b>{{ $city->name }}</b> »
                    <b>{{ $category->name }}</b>
                    &nbsp; (<a href="{{ route('select-city') }}">Change</a>)
                </div>
                <form method="POST"
                    action="{{ route('store.post', ['city' => $city->slug, 'category' => $category->slug]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-4">
                        <div class="card-header">
                            General Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="email" class="col-md-12 col-form-label">{{ __('Title') }}</label>

                                <div class="col-md-12">
                                    <input id="title" type="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location" class="col-md-12 col-form-label">{{ __('Location') }}</label>

                                <div class="col-md-12">
                                    <input id="location" type="location"
                                        class="form-control @error('location') is-invalid @enderror" name="location"
                                        value="{{ old('location') }}" required autocomplete="location" autofocus>

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="description" class="col-md-12 col-form-label">{{ __('Description') }}</label>

                                <div class="col-md-12">
                                    <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror"
                                        name="description" required autocomplete="description" rows="7">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Contact Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Age') }}</label>

                                    <div class="col-md-12">
                                        <input id="age" type="age"
                                            class="form-control @error('age') is-invalid @enderror" name="age"
                                            value="{{ old('age') }}" required autocomplete="age" autofocus>

                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Email') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Phone') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="phone"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Service Details
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Your Gender* :') }}</label>

                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="male" name="gender"
                                                id="flexCheckDefaultmengender" required>
                                            <label class="form-check-label" for="flexCheckDefaultmengender">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="female"
                                                id="flexCheckDefaultwomengender" name="gender" required>
                                            <label class="form-check-label" for="flexCheckDefaultwomengender">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="others"
                                                id="flexCheckCheckedcouplesgender" name="gender" required>
                                            <label class="form-check-label" for="flexCheckCheckedcouplesgender">Others
                                            </label>
                                        </div>
                                    </div>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label">{{ __('Which gender(s) do you offer services to?* :') }}</label>

                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="men"
                                                name="service_for" id="flexCheckDefaultmen" required>
                                            <label class="form-check-label" for="flexCheckDefaultmen">
                                                Men
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="women"
                                                id="flexCheckDefaultwomen" name="service_for" required>
                                            <label class="form-check-label" for="flexCheckDefaultwomen">
                                                Women
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="couples"
                                                id="flexCheckCheckedcouples" name="service_for" required>
                                            <label class="form-check-label" for="flexCheckCheckedcouples">Couples
                                            </label>
                                        </div>
                                    </div>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Incall :') }}</label>

                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="yes" name="incall"
                                                id="flexCheckDefaultyes" checked>
                                            <label class="form-check-label" for="flexCheckDefaultyes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="no"
                                                id="flexCheckDefaultno" name="incall">
                                            <label class="form-check-label" for="flexCheckDefaultno">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    @error('incall')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Outcall :') }}</label>

                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="yes" name="outcall"
                                                id="flexCheckDefaultyesoutcall" checked>
                                            <label class="form-check-label" for="flexCheckDefaultyesoutcall">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="no"
                                                id="flexCheckDefaultnooutcall" name="outcall">
                                            <label class="form-check-label" for="flexCheckDefaultnooutcall">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    @error('outcall')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Important Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="height" class="col-md-12 col-form-label">{{ __('Height') }}</label>

                                    <div class="col-md-12">
                                        <input id="height" type="height"
                                            class="form-control @error('height') is-invalid @enderror" name="height"
                                            value="{{ old('height') }}" autocomplete="height" autofocus>

                                        @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Weight') }}</label>

                                    <div class="col-md-12">
                                        <input id="weight" type="weight"
                                            class="form-control @error('weight') is-invalid @enderror" name="weight"
                                            value="{{ old('weight') }}" autocomplete="weight" autofocus>

                                        @error('weight')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Breast') }}</label>

                                    <div class="col-md-12">
                                        <input id="breast" type="breast"
                                            class="form-control @error('breast') is-invalid @enderror" name="breast"
                                            value="{{ old('breast') }}" autocomplete="breast" autofocus>

                                        @error('breast')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Ethnicity') }}</label>

                                    <div class="col-md-12">
                                        <input id="ethnicity" type="ethnicity"
                                            class="form-control @error('ethnicity') is-invalid @enderror"
                                            name="ethnicity" value="{{ old('ethnicity') }}" autocomplete="ethnicity"
                                            autofocus>

                                        @error('ethnicity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-4">
                        <div class="card-header">
                            Image & Media
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-3">

                                    <input class="form-control dropify" type="file" name="file[]" value=""
                                        accept="image/png, image/gif, image/jpeg">

                                </div>
                                <div class="col-md-3">

                                    <input class="form-control dropify" type="file" name="file[]" value=""
                                        accept="image/png, image/gif, image/jpeg">

                                </div>
                                <div class="col-md-3">

                                    <input class="form-control dropify" type="file" name="file[]" value=""
                                        accept="image/png, image/gif, image/jpeg">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Package & Pricing
                        </div>
                        <div class="card-body">

                            <p>Your current balance is <strong style="color:red;">${{ auth()->user()->balance }}</strong>
                            </p>

                            <div class="row mb-3">
                                <label for="package" class="col-md-4 col-form-label">{{ __('Package :') }}</label>

                                <div class="col-md-8">
                                    <div class="d-flex">
                                        @foreach ($packages as $item)
                                            <div class="form-check mr-2">
                                                <input class="form-check-input" type="radio"
                                                    value="{{ $item->id }}" name="package"
                                                    id="flexCheckDefaultyespackage{{ $item->id }}" required>
                                                <label class="form-check-label"
                                                    for="flexCheckDefaultyespackage{{ $item->id }}">
                                                    {{ $item->name }} - ${{ $item->cost }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('package')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            Terms & Condition
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">


                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultAgree" required>
                                        <label class="form-check-label" for="flexCheckDefaultAgree">
                                            I agree the terms and conditions of this website.
                                        </label>
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-success">Submit & Publish Ad</button>
                                </div>
                            </div>


                        </div>
                    </div>

                </form>
            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
