@extends('frontend.layouts.app')

@section('title')
Signup
@endsection

@section('content')
<div class="container">
  <div class="login-content">
    <form action="index.html" class="l-form">
      <h2 class="title">Register</h2>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Name</h5>
          <input type="text" class="input" />
        </div>
      </div>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Email</h5>
          <input type="email" class="input" />
        </div>
      </div>
      <div class="input-div pass">
        <div class="i">
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <h5>Password</h5>
          <input type="password" class="input" />
        </div>
      </div>
      <input type="submit" class="l-btn" value="Create Account" />
      <a href="{{ route('home.login') }}">You have an account? Login now.</a>
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
