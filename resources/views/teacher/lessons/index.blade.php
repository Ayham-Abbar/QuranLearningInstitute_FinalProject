@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>تصنيفات الدروس</h4>
            </div>
        </div>
    </div>
    <div class="row card-group-row mb-lg-8pt" style="margin: 10px;">
      
        @foreach ($courses as $course)
            <div class="col-md-3 card-group-row__col">
                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card w-80 h-80">
                    
                    <!-- Course Image -->
                    <a href="{{ route('teacher.lessons.showLessons', $course->id) }}" class="card-img-top js-image" data-position="" data-height="140">
                        <img src="{{ asset('images/courses/'.$course->image) }}" alt="subject" class="w-full h-40 object-contain">
                    </a>
                    
                    <!-- NEW Ribbon -->
                    @if($course->isNew)
                        <span class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span>
                    @endif

                    <!-- Course Title & Teacher -->
                    <div class="card-body flex">
                        <a class="card-title" href="{{ route('teacher.lessons.showLessons', $course->id) }}">{{ $course->name }}</a>
                        <small class="text-50 font-weight-bold mb-4pt">{{ $course->users->first()->name }}</small>
                    </div>

                    <!-- Footer (Details about lessons and hours) -->
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>مدة المقرر: 12 ساعة</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>{{ $course->lessons->count()}} درس</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
