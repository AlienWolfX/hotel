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

        table {
            width: 100%;
            margin: 0 auto;
        }

        td {
            padding: 10px;
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
                <h1>Update Video</h1>
                <form action="{{ url('virtual_tour/edit', $video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td><label for="title">Title: </label></td>
                            <td><input type="text" name="title" id="title" value="{{ $video->title }}" required></td>
                        </tr>
                        <tr>
                            <td><label for="room_title">Room: </label></td>
                            <td><input type="text" name="room_title" id="room_title" value="{{ $video->room->room_title }}" readonly></td>
                            <input type="hidden" name="room_id" id="room_id" value="{{ $video->room_id }}">
                        </tr>
                        <tr>
                            <td><label for="video">Upload Video</label></td>
                            <td><input type="file" name="video" id="video"></td>
                        </tr>
                    </table>
                    <input class="btn btn-primary" type="submit" value="Update Video">
                </form>
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
