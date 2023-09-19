@extends('admin.admin_dashboard')
@section('bodyContent')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Fill the Form</h4>
            </div>
        </div>
        @if (session('succcess'))
            <div class="alert alert-success">
                {{ session('succcess') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-7 col-xl-12 stretch-card">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Projects</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Contact</th>
                                        <th class="pt-0">Address</th>
                                        <th class="pt-0">Password</th>
                                        <th class="pt-0">Satus</th>
                                        <th class="pt-0">Joined Date</th>
                                        <th class="pt-0">Last Update</th>
                                        <th class="pt-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div data-bs-toggle="modal" data-bs-target="#nameModal{{ $item->id }}">
                                                    {{ $item->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal" data-bs-target="#emailModal{{ $item->id }}">
                                                    {{ $item->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal"
                                                    data-bs-target="#contactModal{{ $item->id }}">
                                                    {{ $item->phone }}
                                                    @if (empty($item->phone))
                                                        Empty
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal"
                                                    data-bs-target="#addressModal{{ $item->id }}">
                                                    {{ $item->address }}
                                                    @if (empty($item->address))
                                                        Empty
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal"
                                                    data-bs-target="#passwordModal{{ $item->id }}">
                                                    Change
                                                </div>
                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal" data-bs-target="#roleModal{{ $item->id }}">
                                                    {{ $item->role }}
                                                </div>
                                            </td>


                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <div class="btn badge bg-success" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}">
                                                    Delete
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- The Modal for role -->

                                        <div class="modal" id="roleModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Status Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Previous Status
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" required pattern="[A-Za-z ]+"
                                                                title="Only letters and spaces are allowed"
                                                                value="{{ $item->role }}" readonly>

                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            {{-- @method('PUT') --}}
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Update
                                                                    Status</label>
                                                                <input type="text" class="form-control" name="status"
                                                                    required pattern="[a-z ]+"
                                                                    title="Only letters and spaces are allowed"
                                                                    value="" required>
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>

                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal for name -->
                                        <div class="modal" id="nameModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Name Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Previous Name
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" required pattern="[A-Za-z ]+"
                                                                title="Only letters and spaces are allowed"
                                                                value="{{ $item->name }}" readonly>

                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            {{-- @method('PUT') --}}
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Update
                                                                    Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    required pattern="[A-Za-z ]+"
                                                                    title="Only letters and spaces are allowed"
                                                                    value="" required>
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>

                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal for email -->
                                        <div class="modal" id="emailModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Email Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Previous Email
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="{{ $item->email }}" value="{{ $item->email }}"
                                                                readonly>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Update
                                                                    email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    required value="" required>
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal for contact -->
                                        <div class="modal" id="contactModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Contact Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Previous Contact
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="{{ $item->phone }}" value="{{ $item->phone }}"
                                                                readonly>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Update Contact
                                                                </label>
                                                                <input type="text" name="contact" class="form-control"
                                                                    id="{{ $item->phone }}" value="">
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal for address -->
                                        <div class="modal" id="addressModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header address-->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Address Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Previous address
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="{{ $item->address }}" value="{{ $item->address }}"
                                                                readonly>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Update Address
                                                                </label>
                                                                <input type="text" name="address" class="form-control"
                                                                    id="{{ $item->address }}" value="">
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal for password -->
                                        <div class="modal" id="passwordModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header address-->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Teacher Password Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">New Password</label>
                                                            <input type="password" class="form-control"
                                                                id="{{ $item->id }}">
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('teachers.update', ['form' => $item->id]) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Confirm
                                                                    Password</label>
                                                                <input type="password" name="password"
                                                                    class="form-control" id="{{ $item->id }}"
                                                                    value="">
                                                            </div>
                                                            <button class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Model to Delete the user --}}
                                        <div class="modal" id="deleteModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Teacher</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $item->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="{{ route('forms.destroy', ['form' => $item->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
