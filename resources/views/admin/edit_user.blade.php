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
            padding-top: 30px;
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

        table {
            width: 100%;
            margin: 0 auto;
        }

        td {
            padding: 10px;
        }

        input[type="text"], input[type="email"], select {
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
                    <h1>Edit User</h1>
                    <form action="{{ route('manage_users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table>
                            <tr>
                                <td><label for="name">Name: </label></td>
                                <td><input type="text" name="name" id="name" value="{{ $user->name }}" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email: </label></td>
                                <td><input type="email" name="email" id="email" value="{{ $user->email }}" required></td>
                            </tr>
                            <tr>
                                <td><label for="phone">Phone: </label></td>
                                <td><input type="text" name="phone" id="phone" placeholder="{{$user->phone ?? 'No number'}}"></td>
                            </tr>
                            <tr>
                                <td><label for="usertype">User Type: </label></td>
                                <td>
                                    <select name="usertype" id="usertype" required>
                                        <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input class="btn btn-primary" type="submit" value="Update User">
                    </form>
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
