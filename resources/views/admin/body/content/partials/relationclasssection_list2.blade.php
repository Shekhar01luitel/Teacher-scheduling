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
                                        <th class="pt-0">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rowspan = 0;
                                    @endphp
                                    {{-- @dd($ClassSectionRelation) --}}

                                    @foreach ($ClassSectionRelation as $relationtableclass)
                                        {{-- @foreach ($class_relation as $relationtableclass) --}}


                                        @if (!empty($relationtableclass['sections']))
                                            @php
                                                $count = count($relationtableclass['sections']);
                                                $rowspan = $count > 1 ? $count + 1 : 1;
                                            @endphp

                                            <tr>
                                                <td rowspan="{{ $rowspan }}">{{ $loop->iteration }}</td>
                                                {{-- <td rowspan="{{ $rowspsan }}">{{ $ClassSectionRelation->$id }}</td> --}}

                                                <td rowspan="{{ $rowspan }}" id="{{ $relationtableclass['id'] }}">
                                                    {{ $relationtableclass['class'] }}
                                                </td>

                                                @if ($count > 1)
                                                    @foreach ($relationtableclass['sections'] as $sectionlist)
                                            <tr>
                                                <td id="{{ $sectionlist['id'] }}">{{ $sectionlist['sections'] }}</td>
                                                <td>
                                                    {{-- <div class="btn badge bg-success" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">
                                                        Delete
                                                    </div> --}}
                                                    <div class="btn badge bg-success" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        data-classid="{{ $relationtableclass['id'] }}"
                                                        data-sectionid="{{ $sectionlist['id'] }}">
                                                        Delete
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td id="{{$relationtableclass['sections'][0]['id'] }}">
                                            {{ $relationtableclass['sections'][0]['sections'] }}</td>
                                        <td>
                                            {{-- <div class="btn badge bg-success" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">
                                                Delete
                                            </div> --}}
                                            <div class="btn badge bg-success" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-classid="{{ $relationtableclass['id'] }}"
                                                data-sectionid="{{ $relationtableclass['sections'][0]['id'] }}">
                                                Delete
                                            </div>
                                        </td>
                                    @endif
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $relationtableclass['class'] }}</td>
                                        <td>No Section</td>
                                        <td>
                                            <div class="btn badge bg-danger">
                                                No action
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @dd($ClassSectionRelation) --}}
                                    @endif
                                    @endforeach
                                </tbody>
                                <div class="modal" id="deleteModal">
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
                                                ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form method="POST" action="/relationclasssection/destroy">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" id="classId" name="classId" value="">
                                                    <input type="hidden" id="sectionId" name="sectionId"
                                                        value="">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('deleteModal');
        const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        const classIdInput = deleteModal.querySelector('#classId');
        const sectionIdInput = deleteModal.querySelector('#sectionId');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const classId = this.getAttribute('data-classid');
                const sectionId = this.getAttribute('data-sectionid');

                classIdInput.value = classId;
                sectionIdInput.value = sectionId;
            });
        });
    });
</script>
