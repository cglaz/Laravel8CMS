<x-admin-master>
    @section('content')

    <h1 class="h1 mb-0 text-gray-800 text-center mb-5">Edit Role: {{$role->name}}</h1>

    <div class="row">
        <div class="col-sm-6">
            <div class="d-flex flex-column mr-4 ml-4">
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
        </div>

        <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Slug</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$role->slug}}" >
                </div>
        </div>
    </div>

    @endsection
</x-admin-master>
