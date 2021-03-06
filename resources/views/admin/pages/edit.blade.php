<x-admin-master>
@section('content')
    <h1 class="h1 mb-3 text-gray-800 text-center">Edit Page</h1>
	<div class="ml-3 mr-3">
		<form action="{{route('admin.update.page',$page->slug)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text"
					class="form-control"
					name="title"
					id="title"
					value="{{$page->title}}" />
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text"
					class="form-control"
					name="slug"
					id="slug"
					value="{{$page->slug}}" />
			</div>
			<div class="form-group">
				<label for="file">Photo</label>
				<div class="mb-4"><img width="400px;" src="{{$page->page_image}}" alt=""></div>
				<input class="form-control-file"
					name="page_image"
					type="file"
					id="page_image"/>
			</div>
			<div class="form-group">
				<label for="description">Content</label>
				<textarea rows="10" class="form-control" name="body" id="body" >{{$page->body}}</textarea>
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
 @endsection
</x-admin-master>
