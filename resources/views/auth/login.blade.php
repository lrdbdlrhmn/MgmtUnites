@extends('layout.master-mini')

@section('content')
<div class="registration-form">
  <form action="" method="" action="{{ url('dashboard') }}">
      <div class="form-group">
          <span><img src="{{ asset('images/logo.png')}}" width="100px" height="100px" style="margin-left: 40%" />
          </span>
      </div>
      <hr>
      <br>
      <div class="form-group" style="text-align: center">
        <h5>Login</h5>
    </div>
      <div class="form-group">
          <input type="text" class="form-control item" id="username" placeholder="Nom d'Utilisateur">
      </div>
      <div class="form-group">
          <input type="password" class="form-control item" id="password" placeholder="Mot de Passe">
      </div>

      <div class="form-group">
          <button type="button" class="btn btn-primary create-account">Connexion</button>
      </div>
  </form>

</div>
@endsection
