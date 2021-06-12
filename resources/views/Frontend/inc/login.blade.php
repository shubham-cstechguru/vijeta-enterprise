@extends('frontend.layouts.app')

@section('title')
Login
@endsection

@section('content')
<div class="container">
  <div class="login-content">
    <form action="{{ route('home.login.post') }}" class="l-form" method="POST">
      {!! csrf_field() !!}
      {{ \Session::forget('success') }}
      @if(\Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ \Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif
      <h2 class="title">LOGIN</h2>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Email</h5>
          <input name="email" type="email" class="input" />
          @if ($errors->has('email'))
          <span class="help-block font-red-mint">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="input-div pass">
        <div class="i">
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <h5>Password</h5>
          <input name="password" type="password" class="input" />
          @if ($errors->has('password'))
          <span class="help-block font-red-mint">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <input type="submit" class="l-btn" value="Login" />
      <a href="#">Forgot Password?</a><br /><a href="{{route( 'home.register' )}}">Don't have an account? Register now.</a>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
const inputs = document.querySelectorAll(".input");

function addClass() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function removeClass() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addClass);
  input.addEventListener("blur", removeClass);
});
</script>
@endsection
