<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <h4>Editor Dashboard</h4>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ Auth::guard('editor')->user()->name }}</td>
                            <td>{{ Auth::guard('editor')->user()->email }}</td>
                            <td>{{ Auth::guard('editor')->user()->status }}</td>
                            <td>
                                <a
                                    href="{{ route('editor.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('form-logout').submit()">Logout</a>
                                <form
                                    action="{{ route('editor.logout') }}" method="POST"
                                    class="d-none" id="form-logout">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
