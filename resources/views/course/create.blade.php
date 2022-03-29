@extends('layouts.guest')

@section('content')
    <div class="row">
        <div class="col-md-6 m-auto">
            @include('partials.errors')
            <a href="{{ route('courses.index') }}" class="btn btn-dark">Back</a>
            <form action="{{ route('courses.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nume" class="form-label">Nume</label>
                    <input type="text" class="form-control" id="nume" name="nume">
                </div>
                <div class="mb-3">
                    <label for="prenume" class="form-label">Profesor</label>
                    <input type="text" class="form-control" id="profesor" name="profesor">
                </div>
                <div class="mb-3">
                    <label for="grupa" class="form-label">Specialitate</label>
                    <input type="text" class="form-control" name="specialitate" id="specialitate">
                </div>
                
                <button type="submit" class="btn btn-dark">Save</button>
            </form>
        </div>
    </div>
@endsection