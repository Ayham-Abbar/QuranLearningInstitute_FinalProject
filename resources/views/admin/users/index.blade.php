@extends('layouts.app')

@section('content')

<div class="card mb-32pt">
    <div class="card-header">
        <h4>المستخدمين</h4>
    </div>
    <div class="table-responsive"
         data-toggle="lists"
         data-lists-sort-by="js-lists-values-name"
           data-lists-sort-desc="true"
           data-lists-values='["js-lists-values-name", "js-lists-values-email", "js-lists-values-role", "js-lists-values-status", "js-lists-values-image", "js-lists-values-phone"]'>
  
          <table class="table mb-0 thead-border-top-0 table-nowrap">
              <thead>
                  <tr>
                    <th>
                        <a href="javascript:void(0)"
                           class="sort"
                              data-sort="js-lists-values-name">#</a>
                    </th>
                      <th>
                          <a href="javascript:void(0)"
                             class="sort"
                                data-sort="js-lists-values-name">الأسم</a>
                      </th>
  
                      <th style="width: 150px;">
                          <a href="javascript:void(0)"
                             class="sort"
                             data-sort="js-lists-values-email">البريد</a>
                      </th>
  
                      <th style="width: 48px;">
                          <a href="javascript:void(0)"
                             class="sort"
                             data-sort="js-lists-values-role">الدور</a>
                      </th>
  
                      <th style="width: 48px;">
                          <a href="javascript:void(0)"
                             class="sort"
                             data-sort="js-lists-values-status">الحالة</a>
                      </th>
  
                      <th style="width: 48px;">
                          <a href="javascript:void(0)"
                             class="sort"
                             data-sort="js-lists-values-image">الصورة</a>
                      </th>
  
                      <th style="width: 48px;">
                          <a href="javascript:void(0)"
                             class="sort"
                             data-sort="js-lists-values-phone">الهاتف</a>
                      </th>
                      <th style="width: 48px;">
                        <a href="javascript:void(0)"
                           class="sort"
                           data-sort="js-lists-values-phone">العمليات</a>
                    </th>
  
                      <th style="width: 24px;"></th>
                  </tr>
              </thead>
              <tbody class="list" id="employees">
                @if ($users->where('role', '!=', 'admin')->count() > 0)
                  @foreach ($users->where('role', '!=', 'admin') as $user)
                      @if ($user->role != 'admin')
                      <tr>
                          <td class="js-lists-values-name">{{$user->id}}</td>
                          <td class="js-lists-values-name">{{$user->name}}</td>
                          <td class="js-lists-values-email">{{$user->email}}</td>
                          <td class="js-lists-values-role">{{$user->role}}</td>
                          <td class="js-lists-values-status">{{$user->status}}</td>
                          <td class="js-lists-values-image"><img src="{{ asset('images/users/'.$user->image) }} " alt="{{ asset('images/users/'.$user->image) }}" width="50"></td>
                          <td class="js-lists-values-phone">{{$user->phone}}</td>
                          <td class="js-lists-values-phone">
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-primary">تعديل</a>
                                <form action="{{ url('admin/user/delete/'.$user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </div>  
                          </td>
                      </tr>
                      @endif
                  @endforeach
                @else
                <tr>
                  <td colspan="8" class="text-center">لا يوجد مستخدمين</td>
                </tr>
                @endif
              </tbody>
          </table>
      </div>
  </div>
  
@endsection