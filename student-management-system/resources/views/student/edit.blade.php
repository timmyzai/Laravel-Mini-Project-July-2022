@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Edit Student Info <span class="badge bg-info">{{ $student->name }}</span></h4>
    </div>
    <div class="float-end">
        <a href="{{ route('student.index') }}" class="btn btn-info">
            <i class="fa fa-arrow-left"></i> All Students
        </a>
    </div>
    <div class="clearfix"></div>
</div>

<div class="card">
    <form class="p-3" action="{{ route('student.update', $student->id) }}" method="POST">
        <!-- csrf protection -->
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="{{ $student->name }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-select" id="gender" name="gender">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender['value'] }}" {{ $student->gender === $gender['value'] ? 'selected' : '' }}>{{ $gender['label'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" pattern="[0-9]+" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Your Phone Number" value="{{ $student->phone_number }}" required>
                <small id="passwordHelp" class="text-danger">
                    *Must be numbers.
                </small>
            </div>
        </div>

        <a href="{{ route('student.index') }}" class="btn btn-secondary mr-2">
            <i class="fa fa-arrow-left"></i> Cancel
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check"></i> Save
        </button>
    </form>
</div>

@endsection