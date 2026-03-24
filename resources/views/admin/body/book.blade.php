@extends('admin.layout')
@section('layout')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Booking List</h4>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Person</th>
                                <th>Created At</th>
                                <th width="180">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->person }}</td>
                                <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>

                                <td class="text-end">

                                    <!-- EDIT BUTTON -->
                                    <button class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $booking->id }}">
                                        Edit
                                    </button>

                                    <!-- EDIT MODAL -->
                                    <div class="modal fade" id="editModal{{ $booking->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Booking</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('booking.update', $booking->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        <!-- No PUT because you want POST update -->
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text"
                                                                   name="name"
                                                                   value="{{ $booking->name }}"
                                                                   class="form-control"
                                                                   required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email"
                                                                   name="email"
                                                                   value="{{ $booking->email }}"
                                                                   class="form-control"
                                                                   required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Date</label>
                                                            <input type="date"
                                                                   name="date"
                                                                   value="{{ $booking->date }}"
                                                                   class="form-control"
                                                                   required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Time</label>
                                                            <input type="time"
                                                                   name="time"
                                                                   value="{{ $booking->time }}"
                                                                   class="form-control"
                                                                   required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Person</label>
                                                            <select name="person" class="form-control" required>
                                                                <option value="1" {{ $booking->person == 1 ? 'selected' : '' }}>Person 1</option>
                                                                <option value="2" {{ $booking->person == 2 ? 'selected' : '' }}>Person 2</option>
                                                                <option value="3" {{ $booking->person == 3 ? 'selected' : '' }}>Person 3</option>
                                                                <option value="4" {{ $booking->person == 4 ? 'selected' : '' }}>Person 4</option>
                                                            </select>
                                                        </div>

                                                        <button class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- DELETE BUTTON -->
                                    <form action="{{ route('booking.destroy', $booking->id) }}"
                                          method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Delete this booking?')"
                                                class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No bookings yet</td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
