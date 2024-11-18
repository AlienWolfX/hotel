<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        body {
            background-color: #1a1a2e;
            color: #fff;
        }

        h1 {
            font-size: 40px;
            font-weight: bolder;
            color: #fff;
            margin-bottom: 20px;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .gallery-item {
            background-color: #333;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .gallery-item img {
            height: 200px;
            width: 300px;
            border-radius: 10px;
            object-fit: cover;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .form-container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 50%;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #fff;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="file"] {
            background-color: #555;
            color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <center>
                    <h1>Gallery</h1>
                    <div class="gallery-container">
                        @foreach($gallery as $gallery)
                        <div class="gallery-item">
                            <img src="/gallery/{{$gallery->image}}">
                            <a class="btn btn-danger" href="{{url('delete_gallery',$gallery->id)}}">Delete Image</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-container">
                        <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Image" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>

</html>
