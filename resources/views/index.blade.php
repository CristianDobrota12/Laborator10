@extends('layouts.guest')

@section('content')
<div class="row">
    <div class="col-9">
        <h5>Elevi pe grupe</h5>
        <table class="table table-hover table-stripped">
            <thead>
                <tr class="table-dark">
                     <th>#</th>
                     <th>Nume</th>
                     <th>Prenume</th>
                     <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($groups as $group)
                <tr class="table-light">
                    <td colspan="4" class="ps-4 fw-bold">{{ $group->name }}</td>
                </tr>
                @forelse($groups->$students()->get() as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->prenume }}</td>
                        <td class="text-end">
                            @auth
                            <a href="{{route('students.edit', ['student'=>$student->$id])}}" class="btn btn-secundary btn-sm">Edit</a>
                            <a class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteStudent">Delete</a>
                            <!--Modal-->
                            <div class="modal fade" id="delteStudent" tabindex="-1" aria-labelledby="deleteStudentLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteStudentLabel">Delete student</h5>    
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{route('students.destroy', ['student'=>$student->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <h4>Esti sigur?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark">Da</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endauth    
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4">This group no have students</td>
                </tr>
                @endforelse
            @empty
            <tr>
                <td colspan="4">No groups</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="col-3">
        @auth
        <h5>Listele grupelor</h5>
        <ul class="list-group rounded-0">
            @forelse($groups as $group)
            <li class="list-group-item list-group-item-action">
                {{ $group->name }}
            </li>
            @empty
            <li class="list-group-item list-group-item-action">
                Nu sunt date
            </li>
            @endforelse
        </ul>
        @endauth
    </div>
</div>
@endsection