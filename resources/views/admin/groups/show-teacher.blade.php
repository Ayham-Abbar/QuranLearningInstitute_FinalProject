@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>حلقة: {{ $group->name }}/المدرسين</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المدرس</th>
                        <th>البريد</th>
                        <th>الحالة</th>
                        <th>الجنس</th>
                        <th>الموبايل</th>
                    </tr>
                </thead>
                <tbody>
                  @if (isset($teachers) && $teachers->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center">لا يوجد مدرسين في هذا المستوى</td>
                    </tr>
                  @elseif (isset($teachers) )
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td >{{ $teacher->status }}</td>
                          <td class="px-4 py-2 border text-center">
                              {{ $teacher->gender == 'male' ? 'ذكر' : 'أنثى' }}
                          </td>
                            <td>{{ $teacher->phone }}</td>
                            
                        </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6" class="text-center">حدث خطأ في تحميل المدرسين</td>
                    </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
