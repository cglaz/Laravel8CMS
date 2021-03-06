<x-admin-master>
@section('content')
    <h1 class="h3 mb-2 text-gray-800 text-center">Users</h1>



    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Avatar</th>
      <th scope="col">Role</th>
      <th scope="col">Created at</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
@foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td><a href="{{route('admin.show.user', $user->id)}}">{{$user->name}}</a></td>
      <td>{{$user->email}}</td>
      <td><img width="70px;" src="{{$user->avatar}}" alt=""></td>
      <td></td>
      <td>{{$user->created_at}}</td>
      <td>
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection
</x-admin-master>
