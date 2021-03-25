<x-admin-master>
@section('content')
    <h1 class="h1 mb-0 text-gray-800 text-center mb-5">Permissions</h1>

@if(session()->has('create'))
<div class="alert alert-success text-center">
          <strong>{{ session('create') }}</strong>
      </div>
@endif
    <div class="ml-3 mr-3 mb-5">
    <div class="row">
        <div class="col-sm-3 mr-5">
            <form action="{{route('admin.store.permissions')}}" method="post">
            @csrf
                <div class="form-gruop mb-2">
                    <label for="name">Name</label>
                    <input type="text"
                     id="name"
                     name="name"
                     class="form-control @error('name') is-invalid @enderror"
                       >
                    @error('name')
                        <span>{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </form>
        </div>

        <div class="col-sm-6 ml-5">
            <label>Permissions</label>
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
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->slug}}</td>
                <td>
                <form action="{{route('admin.destroy.permissions', $permission->id)}}" method="POST" enctype="multipart/form-data">
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
