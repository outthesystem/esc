@if (isset($students))
    @if (count($students) > 0)
        @php
            $section = \App\Section::find($section_id);
            $subject = \App\Subject::find($subject_id);
        @endphp
        <div class="row justify-content-md-center">
            <div class="col-md-4 mt-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="toll-free-box text-center">
                            <h4> <i class="mdi mdi-chart-bar-stacked"></i> {{ translate('manage_marks') }}</h4>
                            <h5>{{ translate('class') }}: {{ $section->class->name }}</h5>
                            <h5>{{ translate('section') }}: {{ $section->name }}</h5>
                            <h5>{{ translate('subject') }}: {{ $subject->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-sm " width="100%">
                <thead class="thead-dark">
                <tr>
                    <th>{{ translate('student_name') }}</th>
                    <th>{{ translate('mark') }}</th>
                    <th>{{ translate('comment') }}</th>
                    <th>{{ translate('action') }}</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $marks = \App\Mark::where('subject_id', $subject_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->get();
                    @endphp
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->student->user->name }}</td>
                            <td>
                                <input type="text" class="form-control" name="mark_{{ $mark->id }}" id="mark_{{ $mark->id }}" value="{{ $mark->mark_obtained }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="comment_{{ $mark->id }}" id="comment_{{ $mark->id }}" value="{{ $mark->comment }}">
                            </td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-icon btn-success" onclick="saveMark('{{ $mark->id }}')"> <i class="mdi mdi-check-circle"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="text-align: center;">
                <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
                <p>{{ translate('no_data_found') }}</p>
        </div>
    @endif
@else
<div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
</div>
@endif
