<x-admin-master>
@section('content')
<h1 class="text-center mb-4">Change passwor for: {{$user->name}}</h1>

<div class="row">
    <div class="col-sm-6">
        <div class="d-flex flex-column mr-4 ml-4">
            <form action="{{route('admin.change.user.password', $user)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"
                        name="password"
                        class="form-control"
                        id="password">
                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirmation">Confirm password</label>
                    <input type="password"
                        name="password_confirmation"
                        class="form-control"
                        id="password-confirmation">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
