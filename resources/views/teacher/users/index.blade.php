@extends('layouts.app')

@section('content')

<div class="card mb-32pt">
    <div class="card-header">
        <h4>طلابي</h4>
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
  
                      <th style="width: 24px;"></th>
                  </tr>
              </thead>
              <tbody class="list" id="employees">
                  @foreach ($students as $student)
                      <tr>
                          <td class="js-lists-values-name">{{$student->id}}</td>
                          <td class="js-lists-values-name">{{$student->name}}</td>
                          <td class="js-lists-values-email">{{$student->email}}</td>
                          <td class="js-lists-values-role">{{$student->role}}</td>
                          <td class="js-lists-values-status">{{$student->status}}</td>
                          <td class="js-lists-values-image"><img src="{{ asset('images/users/'.$student->image) }} " alt="img" width="50"></td>
                          <td class="js-lists-values-phone">{{$student->phone}}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  
@endsection