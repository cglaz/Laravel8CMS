<x-admin-master>
@section('content')
    <h1 class="h1 mb-0 text-gray-800 text-center mb-5">Roles</h1>
    @if ($message = Session::get('create'))
      <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @elseif($message = Session::get('destroy'))
    <div class="alert alert-danger alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @endif

    <div class="ml-3 mr-3 mb-5">
    <div class="row">
        <div class="col-sm-3 mr-5">
            <form action="{{route('admin.store.roles')}}" method="post">
            @csrf
                <div class="form-gruop mb-2">
                    <label for="name">Name</label>
                    <input type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span>{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </form>
        </div>

        <div class="col-sm-6 ml-5">
            <label>Roles</label>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td><a href="{{route('admin.edit.roles', $role->id)}}">{{$role->name}}</a></td>
                <td>{{$role->slug}}</td>
                <td>
                <form action="{{route('admin.destroy.roles', $role->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
</x-admin-master>
