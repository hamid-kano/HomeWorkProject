@extends('layouts.dashboard')

@section('title', 'متابعة الآليات')
@section('page-title', 'متابعة الآليات')

@section('content')
<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
            <i data-lucide="truck" class="w-6 h-6 text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-secondary-900">متابعة الآليات</h2>
    </div>
    <p class="text-secondary-600">إدارة ومتابعة الآليات والمركبات</p>
</div>
@endsection