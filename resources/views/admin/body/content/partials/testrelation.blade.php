<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th class="pt-0">#</th>
                <th class="pt-0">class</th>
                <th class="pt-0">section</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ClassSectionRelation as $relationtableclass)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    @if (!$relationtableclass['sections'] == [])
                        @php
                            $count = count($relationtableclass['sections']);
                            // echo $count;
                        @endphp
                        <td rowspan="{{ $count + 1 }}">
                            {{ $relationtableclass['class'] }}
                        </td>
                        @foreach ($relationtableclass['sections'] as $sectionlist)
                            @if ($count > 1)
                <tr>
                    <td></td>
                    <td>{{ $sectionlist['sections'] }}</td>
                </tr>
                {{-- {{  $sectionlist['sections'] }} --}}
            @else
                <td>{{ $sectionlist['sections'] }}</td>
            @endif
            @endforeach
        @else
            <td>
                {{ $relationtableclass['class'] }}
            </td>
            <td>No Section</td>
            @endif
            </tr>
        </tbody>
        @endforeach
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            <tr>
                <td></td>
                <td rowspan="2"></td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>2</td>
            </tr>
            </tr>
        </tbody>
    </table>
</div>
