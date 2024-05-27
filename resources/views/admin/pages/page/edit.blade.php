@extends('admin.main')

@section('content')
    <h1>Edit Page</h1>
    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $page->slug }}" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $page->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="10">{{ $page->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
@endsection

@section('scripts')

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: "{{ route('admin.pages.upload', ['_token' => csrf_token() ]) }}"
            }
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
