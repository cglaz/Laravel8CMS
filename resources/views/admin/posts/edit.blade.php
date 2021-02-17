<x-admin-master>

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>

    <form action="{{route('admin.store.post')}}" method="POST" enctype="multipart/form-data">
                 @csrf
    		    <div class="form-group">
    		        <label for="title">Title</label>
    		        <input type="text"
                           class="form-control"
                           name="title"
                           id="title"
                           value="{{$posts->title}}" />

    		    </div>

                <div class="form-group">
    		        <label for="file">Photo</label>
    		        <input class="form-control-file"
                           name="post_image"
                           type="file"
                           id="post_image" />
    		    </div>

    		    <div class="form-group">
    		        <label for="description">Content</label>
    		        <textarea rows="5" class="form-control" name="body" id="body" ></textarea>
    		    </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>

    		</form>

 @endsection


</x-admin-master>
