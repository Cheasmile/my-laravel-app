@extends('admin.layout')
@section('layout')

<div class="row">
    <!-- Posts Table -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Post List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Detail</th>
                                <th>Image</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $post)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->detail }}</td>
                                    <td>
    @if($post->image)
        <img src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('storage/' . $post->image) }}" 
             alt="{{ $post->name }}" 
             width="80" 
             height="60" 
             style="object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>
                                    <td>{{ $post->user ? $post->user->name : '-' }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPost{{ $post->id }}">Edit</button>

                                        <!-- Delete Button -->
                                        <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete this post?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Post Form -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Add New Post</div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Post Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Detail</label>
                        <textarea name="detail" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Subcategory</label>
                        <select name="subcategory_id" id="subcategory" class="form-control" required>
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Post Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">Insert</button>
                </form>

                <script>
                    document.getElementById('category').addEventListener('change', function () {
                        let categoryId = this.value;
                        let subSelect = document.getElementById('subcategory');
                        subSelect.innerHTML = '<option>Loading...</option>';

                        fetch('/category/subcategories/' + categoryId)
                            .then(res => res.json())
                            .then(data => {
                                subSelect.innerHTML = '<option value="">Select Subcategory</option>';
                                data.forEach(sub => {
                                    let opt = document.createElement('option');
                                    opt.value = sub.id;
                                    opt.textContent = sub.name;
                                    subSelect.appendChild(opt);
                                });
                            })
                            .catch(() => {
                                subSelect.innerHTML = '<option>Error loading</option>';
                            });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODALS (outside table!) -->
@foreach($data as $post)
<div class="modal fade" id="editPost{{ $post->id }}" tabindex="-1" aria-labelledby="editPostLabel{{ $post->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPostLabel{{ $post->id }}">Edit Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
          @csrf
          @method('POST') <!-- or PUT if your route is PUT -->

          <div class="mb-3">
            <label>Post Name</label>
            <input type="text" name="name" value="{{ $post->name }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Detail</label>
            <textarea name="detail" class="form-control" rows="3" required>{{ $post->detail }}</textarea>
          </div>

          <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label>Subcategory</label>
            <select name="subcategory_id" class="form-control" required>
              @foreach($post->category->subcategories ?? [] as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $post->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                  {{ $subcategory->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
    <label>Post Image</label>
    <input type="file" name="image" class="form-control">

    @if($post->image)
        <p class="mt-2 mb-1">Current Image:</p>
        <img src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('storage/' . $post->image) }}" 
     alt="Coffee Image" 
     style="width:100px;">
    @endif
</div>


          <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
