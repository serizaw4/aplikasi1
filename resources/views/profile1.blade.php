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
    
    <!-- @if ($errors->has('message'))
  
  <div class="p-4 bg-danger border border-danger-subtle rounded-3">
  

    <strong>{{ $errors->first('message') }}</strong>

  </div>
  @endif -->
    
    
    <form method="POST" action="{{ url('/edit_profile') }}" enctype="multipart/form-data" class="user" >
    @csrf
    
    <!-- @if ($errors->has('message_success'))
  
  <div class="p-4 bg-success border border-danger-subtle rounded-3">
  

    <strong>{{ $errors->first('message_success') }}</strong>

  </div>
  @endif -->
    
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Nama</label>
    <input type="text" value="{{ $user->name }}" name="nama" id="form2Example2" class="form-control">
    
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email</label>
    <input type="email" name="email" value="{{ $user->email }}" id="form2Example1" class="form-control" >
   
  </div>


  <img width="60px" src="{{ asset('/storage/user/'.$user->foto) }}" class="rounded">
 
    
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Masukkan Foto</label>
    <input type="file" name="foto" id="form2Example2" class="form-control">
    
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Edit</button>
  
      
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>