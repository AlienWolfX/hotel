<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
            color: #fff;
        }

        .div_deg {
            padding-top: 20px;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #555;
            color: #fff;
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

        h1 {
            text-align: center;
            color: #fff;
        }

        .current-image {
            display: block;
            margin: 10px 0;
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
                <div class="form-container">
                    <h1>Update Rooms</h1>
                    <form action="{{url('edit_room', $data->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label for="title">Room Title</label>
                            <input type="text" name="title" id="title" value="{{$data->room_title}}" required>
                        </div>
                        <div class="div_deg">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" required>{{$data->description}}</textarea>
                        </div>
                        <div class="div_deg">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" value="{{$data->price}}" required>
                        </div>
                        <div class="div_deg">
                            <label for="type">Room Type</label>
                            <select name="type" id="type" required>
                                <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                                <option value="Family Room">Family Room</option>
                                <option value="Double Room">Double Room</option>
                                <option value="Triple Room">Triple Room</option>
                            </select>
                        </div>
                        <div class="div_deg">
                            <label for="wifi">Free Wifi</label>
                            <select name="wifi" id="wifi" required>
                                <option selected value="{{$data->wifi}}">Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="div_deg">
                            <label>Current Image</label>
                            <img class="current-image" width="100" src="/room/{{$data->image}}">
                        </div>
                        <div class="div_deg">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Update Room">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>

</html>
