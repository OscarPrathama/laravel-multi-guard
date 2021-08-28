<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>Editor Register</h4>

                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                <form action="{{ route('editor.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="text" class="form-control" id="email" name="email" placeholder="Enter email address"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="editor_page" @if ( old('status') === 'editor_page' ) selected @endif>Editor Page</option>
                            <option value="editor_post" @if ( old('status') === 'editor_post' ) selected @endif>Editor Post</option>
                            <option value="editor_product" @if ( old('status') === 'editor_product' ) selected @endif>Editor Product</option>
                        </select>
                        <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input
                            type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="Confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <a href="{{ route('editor.login') }}">I already have an account</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
