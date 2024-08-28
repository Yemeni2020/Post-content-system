<x-layout>
    @section('content')
    <div class="container">
        <h1>Edit a Post</h1>

        <form method="post" action="{{route('admin.posts.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       value="{{$post->title}}"

                >
            </div>
            <div class="mb-3">

                <textarea
                        name="body"
                        class="form-control"
                        id="body"
                        cols="30"
                        rows="10">value="{{$post->body}}"</textarea>
            </div>
            <div class="mb-3">
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="file">File</label>
                <input type="file"
                       name="post_image"
                       class="form-control-file"
                       id="post_image">
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    @endsection
</x-layout>
