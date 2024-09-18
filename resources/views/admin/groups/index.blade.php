@extends('layouts.app')

@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>قائمة الحلقات</h4>
    </div>
    <div class="table-responsive"
         data-toggle="lists"
         data-lists-sort-by="js-lists-values-name"
         data-lists-sort-desc="true"
         data-lists-values='["js-lists-values-name", "js-lists-values-description"]'>

        <table class="table mb-0 thead-border-top-0 table-nowrap">
            <thead>
                <tr>
                    <th>
                        <a href="javascript:void(0)"
                           class="sort"
                           data-sort="js-lists-values-name">الاسم</a>
                    </th>
                    <th>
                        <a href="javascript:void(0)"
                           class="sort"
                           data-sort="js-lists-values-description">الوصف</a>
                    </th>
                    <th>
                        <a href="javascript:void(0)"
                           class="sort"
                           data-sort="js-lists-values-description">المستوى</a>
                    </th>
                    <th style="width: 48px;">
                        العمليات
                    </th>
                </tr>
            </thead>
            <tbody class="list" id="groups">
                @if ($groups->count() == 0)
                    <tr>
                        <td colspan="4" class="text-center">لا توجد حلقات</td>
                    </tr>
                @endif
                @foreach ($groups as $group)
                <tr>
                    <td class="js-lists-values-name">{{ $group->name }}</td>
                    <td class="js-lists-values-description">{{ $group->description }}</td>
                    <td class="js-lists-values-description">{{ $group->level->name }}</td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                              <a href="{{ route('admin.groups.show-student', $group->id) }}" class="btn btn-success">طلاب الحلقة</a>
                              <a href="{{ route('admin.groups.show-teacher', $group->id) }}" class="btn btn-info">مدرسي الحلقة</a>
                            <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-primary">تعديل</a>
                            <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
