@extends('admin.layout')
@section('layout')
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <div class="d-md-flex align-items-center">
          <div>
            <h4 class="card-title">Post List</h4>

          </div>

        </div>
        <div class="table-responsive mt-4">
          <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
            <thead>
              <tr>
                <th scope="col" class="px-0 text-muted">
                  NO
                </th>
                <th scope="col" class="px-0 text-muted">Name</th>
                <th scope="col" class="px-0 text-muted">Detail</th>
                <th scope="col" class="px-0 text-muted">
                  User
                </th>
                <th scope="col" class="px-0 text-muted text-end">
                  Action
                </th>
              </tr>
            </thead>
          <tbody>
@foreach($data as $index => $post)
<tr>

    {{-- Row number --}}
    <td>{{ $index + 1 }}</td>

    <td>{{ $post->name }}</td>

    <td>{{ $post->detail }}</td>

    <td>
        @if($post->user)
            <span class="badge bg-info">{{ $post->user->name }}</span>
        @else
            <span class="text-muted">—</span>
        @endif
    </td>

    <td class="text-end">

        {{-- EDIT BUTTON --}}
        <button class="btn btn-warning btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#editPost{{ $post->id }}">
            Edit
        </button>

        {{-- EDIT MODAL --}}
        <div class="modal fade"
             id="editPost{{ $post->id }}"
             tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Post</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST"
                              action="{{ route('post.update', $post->id) }}">
                            @csrf

                            <div class="mb-3">
                                <label>Post Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $post->name }}"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label>Detail</label>
                                <textarea name="detail"
                                          class="form-control"
                                          rows="3"
                                          required>{{ $post->detail }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id"
                                        class="form-control"
                                        required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Subcategory</label>
                                <select name="subcategory_id"
                                        class="form-control"
                                        required>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ $post->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary w-100">
                                Update
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- DELETE --}}
        <a href="{{ route('post.delete', $post->id) }}"
           onclick="return confirm('Delete this post?')"
           class="btn btn-danger btn-sm">
            Delete
        </a>

    </td>
</tr>
@endforeach
</tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">Post Form</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('post.store') }}">
    @csrf
  <label class="form-label">Post Name</label>
    <input type="text" name="name" class="form-control">

    <label class="form-label">Detail</label>
    <textarea name="detail" class="form-control"></textarea>
    <!-- Category -->
    <label class="form-label">Category</label>
    <select name="category_id" id="category" class="form-control" required>
        <option value=""> Select Category </option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <!-- Subcategory -->
    <label class="form-label">SubCategory</label>
    <select name="subcategory_id" id="subcategory" class="form-control" required>
        <option value=""> Select Subcategory </option>
    </select>

    <button class="btn btn-primary mt-3">Insert</button>
</form>

<script>
document.getElementById('category').addEventListener('change', function () {

    let categoryId = this.value;

    // clear current list first
    let subSelect = document.getElementById('subcategory');
    subSelect.innerHTML = '<option value="">Loading...</option>';

    fetch('/subcategories/by-category/' + categoryId)
        .then(res => res.json())
        .then(data => {
            subSelect.innerHTML = '<option value=""> Select Subcategory </option>';

            data.forEach(function (sub) {
                let opt = document.createElement('option');
                opt.value = sub.id;
                opt.textContent = sub.name;
                subSelect.appendChild(opt);
            });
        });
});
</script>

      </div>
    </div>
  </div>
</div>
</div>


</div>
@endsection