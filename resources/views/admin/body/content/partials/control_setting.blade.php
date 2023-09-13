<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wizard</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Teacher Time table</h4>
                    <p class="text-muted mb-3">Please conmplete the steps .</p>
                    <div id="wizard">
                        <h2>First Step</h2>
                        <section>
                            <h4 class="mb-4">Fill Form</h4>
                            <form class="forms-sample" method="POST" action="/storetotalclass">
                                @csrf
                                <div class="mb-3">
                                    <label for="class" class="form-label">Total Classes</label>
                                    <input type="number" class="form-control" name="class" id="class" placeholder="Class"
                                        min="1" max="50">
                                </div>
                                <div>
                                    <input type="submit" value="Submit Class" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                </div>
                            </form>
                        </section>

                         <h2>Second Step</h2>
                        <section>
                            <h4></h4>
                            <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac
                                ligula elementum pellentesque.
                                In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor
                                elit. Morbi varius, nulla quis condimentum
                                dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit
                                sapien a diam adipiscing consectetur.
                                In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit.
                                Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus,
                                rhoncus sagittis iaculis nec, malesuada a diam.
                                Donec non pulvinar urna. Aliquam id velit lacus.</p>
                        </section>

                        {{--<h2>Third Step</h2>
                        <section>
                            <h4>Third Step</h4>
                            <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo
                                condimentum dapibus. Fusce eros justo,
                                pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend
                                varius ullamcorper. Aliquam erat volutpat.
                                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo
                                lectus sollicitudin in auctor mauris
                                venenatis.</p>
                        </section>

                        <h2>Fourth Step</h2>
                        <section>
                            <h4>Fourth Step</h4>
                            <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris
                                vehicula vulputate. Aliquam sed sem tortor.
                                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum
                                purus, imperdiet varius est pellentesque vitae.
                                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo
                                tortor.</p>
                        </section> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
