@extends('admin.dashboard')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card fp-card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                          <div class="col-9">
                              <p class="fs-08 mr-5 pt-3">Θέλω να εγγραφώ και στο nesletter σας!</p>
                          </div>
                          <div class="col-3">
                              <input id="has_subscription" type="checkbox" class="" name="has_subscription" value="subscribe">
                          </div>
                        </div>
                        <div class="row ">
                          <div class="col-9 ">
                            <p class="fs-08 mr-5">Είμαι άνω των 18 ή έχω γονική συναίνεση να εγγραφώ σε αυτόν τον ιστότοπο!</p>
                          </div>
                          <div class="col-3">
                            <input id="adult" type="checkbox" class="" name="adult" required>
                          </div>
                        </div>
                        <hr>


                        <div class="form-group row mb-0 justify-content-center">
                                <button type="submit" class="btn btn-danger" value="Εγγραφή">
                                    {{ __('Register') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
