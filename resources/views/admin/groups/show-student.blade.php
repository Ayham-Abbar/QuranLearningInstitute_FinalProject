@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4>حلقة: {{ $group->name }}/الطلاب</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الطالب</th>
                        <th>البريد</th>
                        <th>الحالة</th>
                        <th>الجنس</th>
                        <th>الموبايل</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                  @if (isset($students) && $students->isEmpty())
                    <tr>
                      <td colspan="7" class="text-center">لا يوجد طلاب في هذا المستوى</td>
                    </tr>
                  @elseif (isset($students) )
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->status }}</td>
                            <td class="px-4 py-2 border text-center">
                                {{ $student->gender == 'male' ? 'ذكر' : 'أنثى' }}
                            </td>
                            <td>{{ $student->phone }}</td>
                            <td>
                                <form action="{{ route('admin.groups.show-student.destroy', [$group->id, $student->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7" class="text-center">حدث خطأ في تحميل الطلاب</td>
                    </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
