@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- العنوان أعلى الفيديو -->
                        <h1 class="mb-4 font-weight-bold d-flex align-items-center" style="font-size: 1.5rem; color: #007bff;">
                            {{ $lesson->name }}
                            <i class="fas fa-video ml-2" style="font-size: 1.2rem;"></i>  <!-- أيقونة الفيديو -->
                        </h1>
                        
                        <!-- الفيديو بارتفاع محدد -->
                        <div class="mb-4">
                            <video controls style="width: 100%; height: 400px; object-fit: contain;">
                                <source src="{{ asset('storage/' . $lesson->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <!-- الوصف أسفل الفيديو -->
                        <p>{{ $lesson->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
