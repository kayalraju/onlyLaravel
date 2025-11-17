<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
    <style>
        .is-invalid{
            border: 1px solid red;
        }
    </style>
  </head>
  <body>
    
    <div class="container mt-5">
    <h1>Add User</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>    
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" name="title">
                @error('title')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sub Title</label>
                <input type="text" class="form-control {{$errors->first('subtitle') ? 'is-invalid' : ''}}" name="subtitle">
                @error('title')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <input type="text" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" name="content">
                @error('content')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}" name="image">
                @error('image')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            
                  
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>

    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>