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
        input[type="file"],
        select {
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

        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-warning.ml-2 {
            margin-left: 10px;
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
                    <h1>Virtual Tour</h1>
                    <h1>Add Video</h1>
                    <form action="{{ route('virtual_tour.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="div_deg">
                            <label for="video">Video:</label>
                            <input type="file" id="video" name="video" required>
                        </div>
                        <div class="div_deg">
                            <label for="room_id">Room:</label>
                            <select id="room_id" name="room_id" required>
                                <option value="" disabled selected>Select Room</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_deg">
                            <button type="submit" class="btn btn-primary">Add Video</button>
                        </div>
                    </form>
                </div>
                <div class="form-container">
                    <h1>Videos</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Room</th>
                                <th>Filename</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->room->room_title }}</td>
                                    <td>{{ $video->url }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('virtual_tour.destroy', $video->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('virtual_tour.edit', $video->id) }}" class="btn btn-warning ml-2">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>

</html>
