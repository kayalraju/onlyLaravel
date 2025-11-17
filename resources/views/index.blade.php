<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
  </head>
  <body>
    
    
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
        <h1>All Posts  </h1>

        <a href="{{route('posts.addview')}}" class="btn btn-info">Add-Data</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Sub Title</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $index=1;
    @endphp
    @foreach ($posts as $post)
       <tr>
      <th scope="row">{{$index++}}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->subtitle }}</td>
      <td>{{ $post->content }}</td>
        <td><img src="{{asset('uploads/'.$post->image)}}" alt="" width="100px" height="100px"></td>
      <td><a href="{{ route('posts.editview',$post->id) }}" class="btn btn-success">Update</a></td>
      {{-- <td><a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger">Delete</a></td> --}}
      <td><td><form action="{{ route('posts.delete', $post->id) }}"  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
      </td>
      </td>
    </tr>
    @endforeach
   
    
  </tbody>
</table>
    </div>

    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>