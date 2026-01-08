@extends('admin.layout')
@section('layout')
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <div class="d-md-flex align-items-center">
          <div>
            <h4 class="card-title">Category List</h4>

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
                <th scope="col" class="px-0 text-muted">
                  User
                </th>
                <th scope="col" class="px-0 text-muted text-end">
                  Action
                </th>
              </tr>
            </thead>
           <tbody>
@foreach($data as $category)
<tr>
  
    <!--<td>{{ $loop->iteration }}</td> -->
<td>1</td>
    <td>{{ $category->name }}</td>
    <td>
        <span class="badge bg-info">
            {{ $category->user->name ?? '—' }}
        </span>
        <span class="text-muted"></span>
    </td>
    <td class="text-end">
        <button class="btn btn-warning btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#editModal{{ $category->id }}">
            Edit
        </button>
        <div class="modal fade"
             id="editModal{{ $category->id }}"
             tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST"
                              action="{{ route('category.update', $category->id) }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $category->name }}"
                                       class="form-control"
                                       required>
                            </div>

                            <button class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{ route('category.delete', $category->id) }}"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete this category?')">
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
      <div class="card-header">Category Form</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('category.store') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Insert</button>
        </form>

      </div>
    </div>
  </div>
</div>


</div>
@endsection