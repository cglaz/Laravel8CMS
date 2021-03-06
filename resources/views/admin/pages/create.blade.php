<x-admin-master>

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Create Page</h1>

	<form action="{{route('admin.store.page')}}" method="POST" enctype="multipart/form-data">
                 @csrf
    		    <div class="form-group">
    		        <label for="title">Title</label>
    		        <input type="text"
                           class="form-control"
                           name="title"
                           id="title"
                           placeholder="Enter title" />
    		    </div>

                <div class="form-group">
    		        <label for="file">Photo</label>
    		        <input class="form-control-file"
                           name="page_image"
                           type="file"
                           id="page_image" />
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
