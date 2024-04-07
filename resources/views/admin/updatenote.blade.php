<!DOCTYPE html>
<html lang="en">
<base href="/user">
<head>
  @include('admin.css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <style>
    /* Custom CSS for the form */
    .recipe-form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
    }
    
    .recipe-form label {
      font-weight: bold;
    }
    
    .recipe-form input[type="text"],
    .recipe-form textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .recipe-form input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
    }
    
    .recipe-form .btn-primary {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .recipe-form .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    
    <div id="main-wrapper">
        @include('admin.header')

        @include('admin.sidebar')
        <div class="page-wrapper">

            <div class="container-fluid">Update Note</h1>
              <div class="recipe-form">
                <form action="{{url('editnote', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>
                    <div class="div_deg">
                        <label>Note</label>
                        <textarea name="note" >{{$data->note}}</textarea>
                    </div>

                    
                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Update Note">
                    </div>

                </form>
              </div>
            </div>
           
            @include('admin.footer')
          
        </div>

    </div>
    
   
</body>

</html>

