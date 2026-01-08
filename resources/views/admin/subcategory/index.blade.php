@extends('admin.layout')
@section('layout')
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <div class="d-md-flex align-items-center">
          <div>
            <h4 class="card-title">SubCategory List</h4>

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
@foreach($data as $index => $row)
<tr>

    {{-- Row number (1,2,3...) --}}
    <!--<td>{{ $index + 1 }}</td> -->
    <td>1</td>

    <td>{{ $row->name }}</td>

    <td>
        @if($row->user)
           <span class="badge bg-info"> {{ $row->user->name }}</span>
        @else
            <span class="text-muted"></span>
        @endif
    </td>

    <td class="text-end">

        {{-- EDIT BUTTON --}}
        <button class="btn btn-warning btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#editModal{{ $row->id }}">
            Edit
        </button>

        {{-- EDIT MODAL --}}
        <div class="modal fade"
             id="editModal{{ $row->id }}"
             tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Subcategory</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST"
                              action="{{ route('subcategory.update', $row->id) }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Subcategory Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $row->name }}"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id"
                                        class="form-control"
                                        required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $row->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
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
        <a href="{{ route('subcategory.delete', $row->id) }}"
           onclick="return confirm('Delete this subcategory?')"
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
      <div class="card-header">SubCategory Form</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('subcategory.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label">Subcategory Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Insert</button>
        </form>


      </div>
    </div>
  </div>
</div>


</div>
@endsection