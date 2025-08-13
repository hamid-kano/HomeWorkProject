@extends('layouts.dashboard')

@section('title', 'نقاط البيع')
@section('page-title', 'نقاط البيع')

@section('content')
<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
            <i data-lucide="store" class="w-6 h-6 text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-secondary-900">نقاط البيع</h2>
    </div>
    <p class="text-secondary-600">إدارة نقاط البيع والمبيعات</p>
</div>
@endsection