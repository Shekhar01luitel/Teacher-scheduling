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
                                        <th class="pt-0">Class</th>
                                        <th class="pt-0">Section</th>
                                        <th class="pt-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    {{-- @dd($List) --}}
                                    @php
                                        $i = 1;
                                    @endphp

                                    @foreach ($List as $item)
                                        @foreach ($item->customSections as $CustomSection)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    {{ $item->class }}
                                                </td>
                                                <td>

                                                    {{-- @foreach ($item->customSections as $CustomSection) --}}
                                                    {{-- { --}}
                                                    {{ $CustomSection->section_name }}
                                                    {{-- } --}}

                                                </td>
                                                <td>
                                                    <div class="btn badge bg-success" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $CustomSection->id }}">
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
                                                            <h4 class="modal-title">School Name
                                                                Update</h4>
                                                            <div class="btn-close" data-bs-dismiss="modal"></div>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Previous
                                                                    School Name
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control @error('school') is-invalid @enderror"
                                                                    name="name" required pattern="[A-Za-z ]+"
                                                                    title="Only letters and spaces are allowed"
                                                                    value="{{ $item->school }}" readonly>

                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('school.update', ['form' => $item->id]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Update
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" required pattern="[A-Za-z ]+"
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

                                            {{-- Model to Delete the user --}}
                                            <div class="modal" id="deleteModal{{ $CustomSection->id }}">
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
                                                            {{ $item->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="{{ route('section.destroy', ['form' => $CustomSection->id]) }}">
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
