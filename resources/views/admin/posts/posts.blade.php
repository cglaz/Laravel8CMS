
<x-admin-master>

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Posts</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Owner</th>
      <th scope="col">Title</th>
      <th scope="col">Post image</th>
      <th scope="col">Created at</th>
      <th scope="col">Upadted at</th>
    </tr>
  </thead>
  <tbody>
@foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->user->name}}</th>
      <td><a href="">{{$post->title}}</a></td>
      <td><img height="50px" src="{{$post->post_image}}" alt=""></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection

</x-admin-master>
