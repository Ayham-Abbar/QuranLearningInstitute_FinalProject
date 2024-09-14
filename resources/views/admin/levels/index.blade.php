@extends('layouts.app')

@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>المستويات</h4>
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
                    <th style="width: 48px;">
                        العمليات
                    </th>
                </tr>
            </thead>
            <tbody class="list" id="levels">
                @foreach ($levels as $level)
                <tr>
                    <td class="js-lists-values-name">{{ $level->name }}</td>
                    <td class="js-lists-values-description">{{ $level->description }}</td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                              <a href="{{ route('admin.levels.show-student', $level->id) }}" class="btn btn-success">عرض الطلاب</a>
                              <a href="{{ route('admin.levels.show', $level->id) }}" class="btn btn-info">عرض المقررات</a>

                            <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-primary">تعديل</a>
                            <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST" style="display:inline;">
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
