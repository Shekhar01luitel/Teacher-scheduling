<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <section>
                        <h4 class="mb-4">Fill Form</h4>
                        <form class="forms-sample" method="POST" action="{{ route('sectionname') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="class" class="form-label">Class Name</label>
                                <select name="class_id" aria-controls="dataTableExample"
                                    class="form-select form-select-sm">
                                    @foreach ($List as $items)
                                        <option value="{{ $items->id }}">{{ $items->class }}</option>
                                    @endforeach
                                </select>

                                <label for="class" class="form-label">Section Name</label>
                                <input type="name" class="form-control" name="section" id="section-name"
                                    placeholder="Section Name" required>
                            </div>
                            <div>
                                <input type="submit" value="Submit Class"
                                    class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
