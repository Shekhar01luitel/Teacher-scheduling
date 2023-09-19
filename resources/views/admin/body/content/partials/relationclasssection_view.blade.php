<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <section>
                        <h4 class="mb-4">Fill Form</h4>
                        <form class="forms-sample" method="POST" action="{{ route('relationclasssection.create.form') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="class" class="form-label">Class Name</label>
                                <select class="form-control" name="class_id" id="period-name"
                                    placeholder="Period Name" required>
                                    @foreach ($class as $classlist)
                                    <option value="{{$classlist->id}}">  {{ $classlist->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="class" class="form-label">Section Name </label>
                                <select class="form-control" name="section_id" id="period-name"
                                    placeholder="Period Name" required>
                                    @foreach ($section as $sectionlist)
                                    <option value="{{$sectionlist->id}}">  {{ $sectionlist->sections}}</option>
                                    @endforeach
                                </select>
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
