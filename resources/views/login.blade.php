<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>

 <div class="row justify-content-center mt-5">
  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">Login</h1>
      </div>
      <div class="card-body">
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('error') }}
        </div>
        
        @endif
          <form method="POST" action="{{route('login')}}" >
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Email Address</label>
              <input type="email" name="mail" class="form-control" placeholder="Enter Email Id" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" name="pass" class="form-control" required>
            </div>
            <div class="mb-3">
              <div class="d-grid">
                <button class="btn btn-primary">Login</button>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-grid">
                <p>New User? <a href="{{url('/register')}}">Register</a> here</p>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
 </div>    
    
</body>
</html>