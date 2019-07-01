@extends('layouts.app')

@section('content')

  <section class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            @include('share.flash')
          </div>
    </div>
            <div class="row justify-content-center  ">

                <div class="col-md-6 col-lg-4 col-sm-8  rounded border shadow p-3 mb-5 bg-white " id="col-Login" >
                            <p class="text-center"><strong>Inscription</strong></p>
                        
                            <form method="POST" action="{{url('registrations')}}">
                                {{ csrf_field() }}
                                <div class="form-group" id="errorLogin" >
                                </div>
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control @if($errors->get('name')) is-invalid @endif" name="name" value="{{ old('name') }}" placeholder="username" required autofocus>  
                                    @if($errors->has('name'))
                                         <div  class="form-group invalid-feedback"  >{{$errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control @if($errors->get('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">  
                                     @if($errors->has('email'))
                                         <div class="form-group invalid-feedback">{{$errors->first('email') }}</div>
                                    @endif
                                </div>

                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control @if($errors->get('password')) is-invalid @endif"  id="password" name="password"  placeholder="Mot de passe" required>
                                    @if ($errors->has('password'))
                                         <div class="form-group invalid-feedback">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control"  id="password-confirm" name="password_confirmation"  placeholder="confirmer le mot de passe" required>
                                    
                                </div>
                                
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
            </section>
@endsection
