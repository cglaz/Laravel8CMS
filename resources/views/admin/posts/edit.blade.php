<x-admin-master>
@section('content')
    <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
    <form action="{{route('admin.update.post', $post->slug)}}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PATCH')
    		    <div class="form-group">
    		        <label for="title">Title</label>
    		        <input type="text"
                           class="form-control"
                           name="title"
                           id="title"
                           value="{{$post->title}}" />
    		    </div>
				<div class="form-group">
    		        <label for="slug">Slug</label>
    		        <input type="text"
                           class="form-control"
                           name="slug"
                           id="slug"
                           value="{{$post->slug}}" />
    		    </div>
                <div class="form-group">
    		        <label for="file">Photo</label>
                    <div class="mb-4"><img width="400px;" src="{{$post->post_image}}" alt=""></div>
    		        <input class="form-control-file"
                           name="post_image"
                           type="file"
                           id="post_image"
                           />
    		    </div>
    		    <div class="form-group">
    		        <label for="description">Content</label>
    		        <textarea rows="10" class="form-control" name="body" id="body" >{{$post->body}}</textarea>
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
 @endsection
</x-admin-master>
