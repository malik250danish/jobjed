@foreach($results as $val)
    <div class="col-md-4">
        <input type="checkbox" value="{{ $val }}" name="work_experience[]">&nbsp;&nbsp;&nbsp;{{ $val }}
    </div>
@endforeach