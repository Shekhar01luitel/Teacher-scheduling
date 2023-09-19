<div class="page-content mt-0 p-3">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
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


                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">class</th>
                                        <th class="pt-0">section</th>
                                        <th class="pt-0">Joined Date</th>
                                        <th class="pt-0">Last Update</th>
                                        <th class="pt-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($relationtablelist as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div data-bs-toggle="modal"
                                                    data-bs-target="#nameModal{{ $item->id }}">
                                                    @foreach ($class as $classlist)
                                                    @if ($item->class_id == $classlist->id)
                                                        {{$classlist->class}}
                                                    @endif
                                                    @endforeach

                                                </div>

                                            </td>
                                            <td>
                                                <div data-bs-toggle="modal"
                                                    data-bs-target="#nameModal{{ $item->id }}">
                                                    @foreach ($section as $sectionlist)
                                                    @if ($item->section_id == $sectionlist->id)
                                                        {{$sectionlist->sections}}
                                                    @endif
                                                    @endforeach
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

                                        <!-- The Modal for name -->
                                        <div class="modal" id="nameModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">School Period Name
                                                            Update</h4>
                                                        <div class="btn-close" data-bs-dismiss="modal"></div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Previous
                                                                Period Name
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('school') is-invalid @enderror"
                                                                name="name" required pattern="[A-Za-z ]+"
                                                                title="Only letters and spaces are allowed"
                                                                value="{{ $item->periods }}" readonly>

                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('period.update', ['period' => $item->id]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Update
                                                                    Period Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="periods" value="" required>
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
                                                        <h4 class="modal-title">Delete Teacher
                                                        </h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete
                                                        {{ $item->periods }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="{{ route('period.destroy', ['period' => $item->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
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
</div>
