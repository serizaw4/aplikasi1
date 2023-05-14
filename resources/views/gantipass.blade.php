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

    @if ($errors->has('message_success'))

  <div class="p-4 bg-success border border-success-subtle rounded-3">

      <strong>{{ $errors->first('message_success') }}</strong>
     

  </div>
    @endif

    @if ($errors->has('message'))

  <div class="p-4 bg-danger border border-danger-subtle rounded-3">

      <strong>{{ $errors->first('message') }}</strong>
     

  </div>
    @endif

    
    

    @if ($errors->has('email'))
  
  <div class="p-4 bg-danger border border-danger-subtle rounded-3">
  

    <strong>{{ $errors->first('email') }}</strong>

  </div>
  @endif


  @if ($errors->has('password'))

  <div class="p-4 bg-danger border border-danger-subtle rounded-3">

    <strong>{{ $errors->first('password') }}</strong>

  </div>
  @endif
    
    <form method="POST" action="{{ url('/ganti_password') }}" class="user" >
    @csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Masukkan Password Lama</label>
    <input type="password" name="pass_lama" id="form2Example1" class="form-control" >
   
  </div>



  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Password Baru</label>
    <input type="password" name="pass_baru" id="form2Example2" class="form-control" required>
    
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Konfirmasi Password Baru</label>
    <input type="password" name="pass_baru2" id="form2Example2" class="form-control" required>
    
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

  
</form>
      
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>