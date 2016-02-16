@if (isset($fail) || !is_null(Session::get('fail')))
    <div class="alert alert-danger">
        @if (isset($fail))
            <p>{{ $fail }}</p>
        @else
            <p>{{ Session::get('fail') }}
        @endif
    </div>
@endif