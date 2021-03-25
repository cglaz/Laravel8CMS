<x-admin-master>
    @section('content')

    <h1 class="h1 mb-0 text-gray-800 text-center mb-5">Edit Role: {{$role->name}}</h1>
    @if (session()->has('update'))
      <div class="alert alert-success text-center">
          <strong>{{ session('update') }}</strong>
      </div>
    @endif


        <div class="row mr-1 ml-1">
            <div class="col-sm-6">
                    <form action="{{route('admin.update.roles', $role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}" >
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
            </div>

            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Slug</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$role->slug}}" readonly>
                    </div>
            </div>
        </div>

        @if($permissions->isNotEmpty())
        <div class="row mr-1 ml-1 mt-5">
            <div class="col-lg-12">
                <label>Permissions</label>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Options</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>
                             <input type="checkbox"
                        @foreach($role->permissions as $permission_role)
                                @if($permission_role->slug == $permission->slug)
                                    checked
                                @endif
                        @endforeach
                        ></td>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->slug}}</td>
                        <td>
                            <form method="post" action="{{route('admin.role.permission.attach', $role)}}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="permission" value="{{$permission->id}}">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                @if($role->permissions->contains($permission))
                                    disabled
                                @endif
                            >Attach</button>
                            </form>
                        </td>
                        <td>
                        <form method="post" action="{{route('admin.role.permission.detach',$role)}}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="permission" value="{{$permission->id}}">
                        <button
                            type="submit"
                            class="btn btn-danger"
                            @if(!$role->permissions->contains($permission))
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
        @endif

    @endsection
</x-admin-master>
