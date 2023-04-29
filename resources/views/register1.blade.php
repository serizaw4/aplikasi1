<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
  <div class="row" style="padding-top: 70px;">
    <div class="col">
    
    </div>
    <div class="col">
    
    @if ($errors->has('message'))
  
  <div class="p-4 bg-danger border border-danger-subtle rounded-3">
  

    <strong>{{ $errors->first('message') }}</strong>

  </div>
  @endif
    
    
    <form method="POST" action="{{ url('/aksi_register') }}" class="user" >
    @csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Nama</label>
    <input type="text" name="nama" id="form2Example2" class="form-control" required>
    
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email</label>
    <input type="email" name="email" id="form2Example1" class="form-control" >
   
  </div>



  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Password</label>
    <input type="password" name="password" id="form2Example2" class="form-control" required>
    
  </div>

<div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Konfirmasi Password</label>
    <input type="password" name="password1" id="form2Example2" class="form-control" required>
    
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
  
      
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>