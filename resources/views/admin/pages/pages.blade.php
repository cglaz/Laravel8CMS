<x-admin-master>
@section('content')
    <h1 class="h3 mb-2 text-gray-800 text-center">Pages</h1>

    @if ($message = Session::get('update'))
      <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>

    @elseif ($message = Session::get('create'))
      <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @elseif ($message = Session::get('destroy'))
      <div class="alert alert-success alert-block text-center">
          <strong>{{ $message }}</strong>
      </div>
    @endif

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Page image</th>
      <th scope="col">Created at</th>
      <th scope="col">Upadted at</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
@foreach($pages as $page)
    <tr>
      <td><a href="{{route('admin.edit.page', $page->id)}}">{{$page->title}}</a></td>
      <td><img height="50px" src="{{$page->page_image}}" alt=""></td>
      <td>{{$page->created_at->diffForHumans()}}</td>
      <td>{{$page->updated_at->diffForHumans()}}</td>
      <td>
        <form action="{{route('admin.destroy.page', $page->id)}}" method="POST" enctype="multipart/form-data">
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
