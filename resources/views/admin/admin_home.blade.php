<!-- admin_home.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          @include('admin.footer', ['userCount' => $userCount, 'roomCount' => $roomCount, 'pendingBookingsCount' => $pendingBookingsCount, 'userCount' => $userCount, 'pendingBookingsCount' => $pendingBookingsCount, 'availableRooms' => $availableRooms])

        </div>
      </div>
    </div>

    <!-- JavaScript files Start-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
    <!-- JavaScript files End-->

  </body>
</html>
