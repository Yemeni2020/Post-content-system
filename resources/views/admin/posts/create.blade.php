<x-layout>
    @section('content')
        <div class="container">
            <h2>Create Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Name" @required(true)>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">content</label>
                    <textarea class="form-control" id="body" name="body" rows="3" placeholder="Enter Post content" @required(true) minlength="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control-file" id="post_image"  name="post_image" @required(true)>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-label-secondary">Reset</button>
            </form>
        </div>

    @endsection
</x-layout>
