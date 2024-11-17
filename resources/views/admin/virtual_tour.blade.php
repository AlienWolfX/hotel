<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
        }

        .div_deg {
            padding-top: 30px;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
        }

        /* Specific text color changes */
        h1,
        label[for="title"],
        label[for="video"],
        label[for="room_id"],
        .div_center h1,
        .div_deg label {
            color: rgb(255, 253, 253);
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
                <div class="div_center">
                    <h1 style="color: rgb(255, 255, 255);">Virtual Tour</h1>
                </div>
                <div class="div_deg">
                    <h1>Add Video</h1>
                    <form action="{{ route('virtual_tour.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="video" class="col-sm-2 col-form-label">Video:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="video" name="video" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room_id" class="col-sm-2 col-form-label">Room:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="room_id" name="room_id" required>
                                    <option value="" disabled selected>Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Add Video</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="div_deg">
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
                                            <a href="{{ route('virtual_tour.update', $video->id) }}" class="btn btn-warning ml-2">Edit</a>
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
