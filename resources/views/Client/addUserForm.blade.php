
@extends('layouts.elite_client' )



@section('content')

<div class="row col-12 dpib-custom-form">



    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('saveuserform') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                       <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-8">            
                                                    <div class="custom-control custom-radio">
                                                        
                                                  
                                                        <input type="radio" id="customer_type_11" name="role" value="CUSTOMER_MANAGER"  class="get-outta-here dib_customer_type custom-control-input form-control" data-default-value="0" >
                                                        <label class="custom-control-label" for="customer_type_11">Manager</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                         
                                                        <input type="radio" id="customer_type_21" name="role" value="CUSTOMER_OFFICER"  class="get-outta-here dib_customer_type custom-control-input form-control" data-default-value="1" >
                                                        <label class="custom-control-label" for="customer_type_21">Officer</label>
                                                    </div>
                                @if($errors->has('role'))
                                    <span class="invalid-feedback" role="alert" style="display:block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

   

    
    @endsection
    
    @section('pagescript')

    
     @endsection