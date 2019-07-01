@extends('layouts.app')
@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
        <div class="intro-text">
          
        </div>
      </div>
    </header>
  <!--headeEnd-->  
  <register-component></register-component>
  <section >
 <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
         @include('share.flash') 
          </div>
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">les utilisateurs</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
			 <div class="alert clearfix">
                    <a href="{{url('registrations/create')}}" class="btn btn-primary btn-block" >Ajouter un utilisateur</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Ajouter un utilisateur
</button>
             </div>
    	   </div>
        </div>
        <div class="row">
        	<div class="col-md-12 col-sm-12">
          	<table class="table">
          		<head>
          			<tr>
          				<th>nom @{{message}}</th>
          				<th>email</th>
          				<th>actions</th>
          			</tr>
          		</head>
          		<body>
                   
          			<tr v-for="user in users">
          				<th>@{{user.name}}</th>
          				<th>@{{user.email}}</th>
          				<th>
          					
          				</th>
          			</tr>
          		</body>
          	</table>
            <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-6 ">
             </div>
          <div class="col-md-6 col-lg-6 col-sm-6 ">
            {{ $users->links() }}
             </div>
           </div>
      </div>
          </div>
      </div>
  </div>
  </section> 
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">add user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="POST" action="{{url('registrations')}}">
                                {{ csrf_field() }}
                                <div class="modal-body">
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
                             </div>
                             <div class="modal-footer">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </form>
    </div>
  </div>
</div>
@endsection