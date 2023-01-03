@extends('layouts.admin.main')

@section('title', 'Admin | Add Enrollment')

@section('contents')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Add Enrollment</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('admin.student.profile', $student) }}"
                                class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('admin.enrollment.create', $student) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="course">Course</label>
                                    <select name="course" id="course"
                                        class="form-select @error('course') is-invalid @enderror">
                                        <option value="" selected hidden disabled>Select a course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" (old('course'))
                                                {{ old('course') == $course->id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('course')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="batch">Batch</label>
                                    <select name="batch" id="batch"
                                        class="form-select @error('batch') is-invalid @enderror">
                                        <option value="" selected hidden disabled>Select a batch</option>
                                        @foreach ($batches as $batch)
                                            <option value="{{ $batch->id }}" (old('batch'))
                                                {{ old('batch') == $batch->id ? 'selected' : '' }}>
                                                {{ $batch->course->name . ' (' . $batch->class_shift->shift . ')' }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('batch')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div>
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
