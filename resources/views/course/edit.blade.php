@section('content')
    <div class="row">
        <div class="col-md-6 m-auto">
            <a href="{{ route('courses.index') }}" class="btn btn-dark">Back</a>
            <form action="{{ route('couses.update', ['course'=>$course->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nume" class="form-label">Nume</label>
                    <input type="text" class="form-control" id="nume" name="nume" value="{{ $course->nume }}">
                </div>
                <div class="mb-3">
                    <label for="prenume" class="form-label">Profesor</label>
                    <input type="text" class="form-control" id="profesor" name="profesor" value="{{ $course->profesor }}">
                </div>
                <div class="mb-3">
                    <label for="grupa" class="form-label">Gupa</label>
                    <select name="group_id" id="grupa" class="form-control">
                    @foreach ($groups as $key => $value)
                        @if($key === $student->group_id)
                            <option class="form-control" selected value="{{ $key }}">{{ $value }}</option>
                        @else
                            <option class="form-control" value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Edit</button>
            </form>
        </div>
    </div>
@endsection