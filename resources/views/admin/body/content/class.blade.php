@extends('admin.admin_dashboard')
@section('bodyContent')
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">Teacher Timetable</h1>
                <div class="timetable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8:00 AM - 9:00 AM</td>
                                <td>Math</td>
                                <td>Science</td>
                                <td>English</td>
                                <td>History</td>
                                <td>Physical Education</td>
                            </tr>
                            <tr>
                                <td>9:00 AM - 10:00 AM</td>
                                <td>Science</td>
                                <td>Math</td>
                                <td>History</td>
                                <td>English</td>
                                <td>Physical Education</td>
                            </tr>
                            <tr>
                                <td>10:00 AM - 11:00 AM</td>
                                <td>English</td>
                                <td>History</td>
                                <td>Math</td>
                                <td>Science</td>
                                <td>Physical Education</td>
                            </tr>
                            <!-- Add more rows for each time slot -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
