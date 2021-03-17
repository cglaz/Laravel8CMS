<x-admin-master>
@section('content')
<h1 class="text-center mb-4">User Profil for: {{$user->name}}</h1>

<div class="row">
    <div class="col-sm-6">
    <div class="d-flex flex-column mr-4 ml-4">
            <form action="{{route('admin.update.user.profile', $user)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                <div class="mb-4">
                    <img class="img-profile rounded-circle" height="50px" src="{{$user->avatar}}">
                </div>
                <div class="form-grup">
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text"
                        name="username"
                        class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"
                        id="username"
                        value="{{$user->username}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                        name="name"
                        class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                        id="name"
                        value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"
                        name="email"
                        class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                        id="email"
                        value="{{$user->email}}">

                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

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

    		    <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>
    	    </form>
            </div>
        </div>
    </div>


    <div class="d-flex flex-column mr-4 ml-4 mb-8">
    <h1 class="text-center mb-4">Roles</h1>

    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex flex-column mr-4 ml-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Options</th>
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Attach</th>
                        <th scope="col">Detach</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td><input type="checkbox"
                        @foreach($user->roles as $user_role)
                                @if($user_role->slug == $role->slug)
                                    checked
                                @endif
                        @endforeach
                        ></td>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->slug}}</td>
                        <td>
                            <form method="post" action="{{route('admin.user.role.attach', $user)}}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="role" value="{{$role->id}}">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                @if($user->roles->contains($role))
                                    disabled
                                @endif
                            >Attach</button>
                            </form>
                        </td>
                        <td>
                        <form method="post" action="{{route('admin.user.role.detach', $user)}}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="role" value="{{$role->id}}">
                        <button
                            type="submit"
                            class="btn btn-danger"
                            @if(!$user->roles->contains($role))
                                disabled
                            @endif
                        >Detach</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
</x-admin-master>
