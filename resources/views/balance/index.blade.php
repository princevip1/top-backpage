@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reload Balance</li>
                    </ol>
                </nav>

                <p
                    style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 18px;font-weight: 600;padding: 5px 5px;margin: 30px 0px;">
                    Your current balance is <strong
                        style="color:red;font-size: 30px;letter-spacing: 2px">${{ auth()->user()->balance }}</strong> </br>
                    From here you can reload balance if you need
                    more. We take a manual verification before we approve your transaction.</br> So please allow few minutes
                    after you complete your transaction.</p>

                @include('partials.common.bAlert')

                <div class="card">
                    <div class="card-header">{{ __('Reload Balance') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('reload-balance.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="payment_method"
                                    class="col-md-12 col-form-label">{{ __('Payment Method') }}</label>

                                <div class="col-md-12">
                                    <select id="payment_method" type="payment_method"
                                        class="form-control @error('payment_method') is-invalid @enderror"
                                        name="payment_method" required autocomplete="payment_method">

                                        <option value="bitcoin" {{ old('payment_method') === 'bitcoin' ? 'selected' : '' }}>
                                            Bitcoin</option>

                                    </select>

                                    @error('payment_method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="amount" class="col-md-12 col-form-label">{{ __('Amount In USD') }}</label>

                                <div class="col-md-12">
                                    <input id="amount" type="amount"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                                    <button type="submit" class="btn btn-sm btn-success">Accept & Reload</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header">{{ __('Reloading History') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($balanceReloadHistories as $reload)
                                    <tr>
                                        <th scope="row">{{ $reload->transaction_id }}</th>
                                        <td>{{ $reload->amount }}</td>
                                        <td>{{ $reload->payment_method }}</td>
                                        <td>{{ $reload->address }}</td>
                                        <td>{{ $reload->status }}</td>
                                        <td>{{ $reload->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
