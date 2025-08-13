@extends('layouts.dashboard')

@section('title', 'المستودعات')
@section('page-title', 'المستودعات')

@section('content')
<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
            <i data-lucide="warehouse" class="w-6 h-6 text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-secondary-900">المستودعات</h2>
    </div>
    <p class="text-secondary-600">إدارة المخزون والمواد الغذائية</p>
</div>
@endsection