@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Reload Status') }}</div>

                    <div class="card-body">
                        @if ($check_transaction_passed)
                            @if ($status == 'canceled')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry your
                                    transaction attempt cancelled ! </div>
                            @elseif($status == 'success')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">Thanks your
                                    transaction attempt completed ! We
                                    are reviewing your transaction. After that we will add it to your balance soon. </div>
                            @endif
                        @else
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> Sorry your
                                transaction is not correct ! </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
