@extends('layouts.app')
@section('content')
<div class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">المستوى: {{ $level->name }}/المقررات</h2>
  </div>
  <div class="card mb-32pt">
    <div class="table-responsive">
      <table class="table mb-0 thead-border-top-0 table-nowrap">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>الصورة</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($courses as $course)
          <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>
              <img src="{{ asset('images/courses/'.$course->image) }}" alt="{{ $course->name }}" class="h-full w-full object-cover object-center">
            </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
