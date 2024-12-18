<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a9372b1ff7.js" crossorigin="anonymous"></script>
    @vite('resources/css/login.css')
    @vite('resources/js/app.js')
    <title>Himvote</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="/login" method="post" class="sign-in-form">
            @csrf
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Enter your email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Enter your password" required />
            </div>
            <input type="submit" value="Log in" class="btn solid" />
            <p class="social-text">Or log in with your social accounts</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          <form action="/register" method="post" class="sign-up-form">
            @csrf
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Enter your email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Create a password" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password_confirmation" placeholder="Confirm your password" required />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or register with your social accounts</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New to Himvote?</h3>
            <p>
              Join our community and start voting for your favorite candidates or issues!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register Now
            </button>
          </div>
          <img src="{{ asset('Images/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already a member?</h3>
            <p>
              Log in to participate in the ongoing voting sessions and track your results.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Log In
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script>
        const signUpButton = document.getElementById('sign-up-btn');
        const signInButton = document.getElementById('sign-in-btn');
        const signInForm = document.querySelector('.sign-in-form');
        const signUpForm = document.querySelector('.sign-up-form');

        signUpButton.addEventListener('click', () => {
          signInForm.classList.add('hidden');
          signUpForm.classList.remove('hidden');
        });

        signInButton.addEventListener('click', () => {
          signUpForm.classList.add('hidden');
          signInForm.classList.remove('hidden');
        });
    </script>
  </body>
</html>
