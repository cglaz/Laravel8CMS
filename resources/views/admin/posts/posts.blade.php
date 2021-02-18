
<x-admin-master>

@section('content')
    <h1 class="h1 mb-3 text-gray-800 text-center">Posts</h1>

    @if ($message = Session::get('destroy'))
      <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @elseif($message = Session::get('create'))
    <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @elseif($message = Session::get('update'))
    <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @endif

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Owner</th>
      <th scope="col">Title</th>
      <th scope="col">Post image</th>
      <th scope="col">Created at</th>
      <th scope="col">Upadted at</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
@foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->user->name}}</th>
      <td><a href="{{route('admin.edit.post', $post->id)}}">{{$post->title}}</a></td>
      <td><img height="50px" src="{{$post->post_image}}" alt=""></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
      <td>
        <form action="{{route('admin.destroy.post',$post->id)}}" method="POST" enctype="multipart/form-data">
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
