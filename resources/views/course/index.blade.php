@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('course.create') }}" class="btn btn-dark">Add</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">specialitate</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $course->nume }}</td>
                            <td>{{ $course->profesor }}</td>
                            <td>{{ $course->specialitate }}</td>
                            <td>{{ $course->nr_credite }}</td>
                            <td class="text-end">
                                <a href="{{route('course.edit', ['course'=>$course->id])}}" 
                                class="btn btn-secondary">Edit</a>
                                <a class="btn btn-dark"
                                    data-bs-toggle="modal" data-bs-target="#deleteStudent">Delete</a>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteCourse" tabindex="-1" aria-labelledby="deleteCourseLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCourseLabel">Delete student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('course.destroy', ['course'=>$course->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body">
                                                    <h4>Esti sigur?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="subbmit" class="btn btn-dark">Da</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No courses</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
