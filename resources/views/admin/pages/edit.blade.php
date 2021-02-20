<x-admin-master>

@section('content')
    <h1 class="h3 mb-3 text-gray-800 text-center">Edit Page</h1>

    <form action="{{route('admin.update.page',$page->id)}}" method="POST" enctype="multipart/form-data">
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
    		        <label for="file">Photo</label>
                    <div class="mb-4"><img width="400px;" src="{{$page->post_image}}" alt=""></div>
    		        <input class="form-control-file"
                           name="post_image"
                           type="file"
                           id="post_image"
                           />
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

 @endsection


</x-admin-master>
