@extends('layout_account')
@section("content_account")
    <div
      class="middle-box text-center loginscreen animated fadeInDown"
      id="loginForm"
    >
      <div>
        <div>
          <h1 class="logo-name">LEVENTS</h1>
        </div>
        <h3>Welcome to Levents</h3>
        <p>
          Perfectly designed and precisely prepared admin theme with over 50
          pages with extra new web app views.
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="{{URL::to('/login-customer')}}" method="POST">
          @csrf
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              placeholder="Email"
              required=""
              name="email_account"
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              required=""
              name="password_account"
            />
          </div>
          <button type="submit" class="btn btn-primarySecond block full-width m-b">
            Login
          </button>

          <a href="#" class="popup-link" data-popup="forgot">
            <small>Forgot password?</small>
          </a>
          <p class="text-muted text-center">
            <small>Sign in with your email and password or create a profile if you are new.</small>
          </p>
          <a
            class="btn btn-sm btn-white btn-block popup-link"
            data-popup="register"
          >
            Create an account
          </a>
        </form>
        <p class="m-t">
          <small
            >John my website Levents &copy; 2024</small
          >
        </p>
      </div>
    </div>

    <!-- Popup Overlay -->
    <div class="popup-overlay" id="popupOverlay">
      <!-- Register Popup -->
      <div class="popup" id="registerPopup">
        <button class="popup-close" onclick="closePopup()" style="background-color: transparent; border: none">&times;</button>
        <h3>Register to Levents</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" action="{{URL::to('/add-customer')}}" method="POST">
          @csrf
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Name"
              required=""
              name="customer_name"
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              placeholder="Email"
              required=""
              name="customer_email"
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              required=""
              name="customer_password"
            />
          </div> 
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Number Phone"
              required=""
              name="customer_phone"
            />
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" required /> Agree the terms and policy
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primarySecond block full-width m-b">
            Register
          </button>
        </form>
      </div>

      <!-- Forgot Password Popup -->
      <div class="popup" id="forgotPopup">
        <button class="popup-close" onclick="closePopup()">&times;</button>
        <h3>Forgot Password</h3>
        <p>Enter your email address to reset your password.</p>
        <form class="m-t" role="form">
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              placeholder="Email address"
              required=""
            />
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">
            Send Reset Link
          </button>
        </form>
      </div>
    </div>
@endsection