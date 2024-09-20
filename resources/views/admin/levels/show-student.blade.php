@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>المستوى: {{ $level->name }}/الطلاب</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>الطالب</th>
                        <th>البريد</th>
                        <th>الحلقة</th>
                        <th>الجنس</th>
                        <th>الموبايل</th>
                        <th>الصورة</th>
                    </tr>
                </thead>
                <tbody>
                  @if (isset($users) && $users->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center">لا يوجد طلاب في هذا المستوى</td>
                    </tr>
                  @elseif (isset($users) )
                    @foreach ($users as $user)
                    @if ($user->role == 'student')
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->groups[0]->name }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <img src="{{ asset('images/users/' . $user->image) }}" alt="Student Image" style="width: 40px; height: 40px;">
                            </td>
                        </tr>
                    @endif
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6" class="text-center">حدث خطأ في تحميل الطلاب</td>
                    </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
