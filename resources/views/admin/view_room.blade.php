<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: darkblue;
            padding: 15px;
            color: white;

        }

        tr {
            border: 3px solid white;
        }

        td {
            padding: 10px;
            color: white;
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


                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>


                    @foreach ($data as $data)


                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->description,150)!!}</td>
                        <td>₱{{$data->price}}</td>
                        <td>{{$data->wifi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td><img width="100" src="room/{{$data->image}}"></td>

                        <td><a onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger"
                                href="{{url('room_delete',$data->id)}}">Delete</a></td>

                        <td><a class="btn btn-warning"
                                href="{{url('room_update',$data->id)}}">Update</a></td>
                    </tr>

                    @endforeach

                </table>


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