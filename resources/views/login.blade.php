@extends('layouts.login')

@section('content')
@if ($errormessage = Session::get('error'))
<div class='alert alert-danger alert-block'>
    <button type='button' class='close' data-dismiss='alert'>*</button>
    <strong>{{ $errormessage }}</strong>
</div>
@endif

<form class="form-horizontal form-material text-center" id="loginform" action="{{ route('checklogin') }}" method="post">
      @csrf
                    <a href="javascript:void(0)" class="db"><img src="{{ asset('elitedesign/assets/images/graylogo.png') }}" alt="Home" style='height:75px'/></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                   
                                    <input class="custom-control-input" id="customCheck1" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div> 
                                
                            </div>   
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">{{ __('Login') }}</button>
                        </div>
                    </div>
                    
                   
                </form>
@endsection







