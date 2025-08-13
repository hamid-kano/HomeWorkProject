@extends('layouts.dashboard')

@section('title', 'الموارد البشرية')
@section('page-title', 'الموارد البشرية')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الموظفين</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['total'] }}</p>
            </div>
            <i data-lucide="users" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">الموظفين النشطين</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['active'] }}</p>
            </div>
            <i data-lucide="user-check" class="w-8 h-8 text-success-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">عدد الأقسام</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['departments'] }}</p>
            </div>
            <i data-lucide="building" class="w-8 h-8 text-warning-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الرواتب</p>
                <p class="text-2xl font-bold text-secondary-900">{{ number_format($stats['total_salary']) }} ل.س</p>
            </div>
            <i data-lucide="banknote" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
</div>

<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
    <div class="p-6 border-b border-secondary-200">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-secondary-800">قائمة الموظفين</h3>
            <button onclick="openAddModal()" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="user-plus" class="w-4 h-4"></i>
                إضافة موظف
            </button>
        </div>
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث في الموظفين..." class="flex-1 px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <button type="submit" class="bg-secondary-500 hover:bg-secondary-600 text-white px-4 py-2 rounded-lg">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secondary-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الاسم</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">القسم</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">المنصب</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الراتب</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الحالة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-secondary-200">
                @foreach($employees as $employee)
                <tr class="hover:bg-secondary-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-secondary-900">{{ $employee->name }}</div>
                        <div class="text-sm text-secondary-500">{{ $employee->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $employee->department }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $employee->position }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ number_format($employee->salary) }} ل.س</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($employee->status == 'نشط') bg-success-100 text-success-800
                            @else bg-danger-100 text-danger-800 @endif">
                            {{ $employee->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <button onclick="openEditModal({{ $employee->id }}, '{{ $employee->name }}', '{{ $employee->email }}', '{{ $employee->phone }}', '{{ $employee->department }}', '{{ $employee->position }}', {{ $employee->salary }}, '{{ $employee->status }}')" class="inline-flex items-center justify-center w-8 h-8 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 rounded-lg transition-all duration-200 hover:scale-110" title="تعديل">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $employee->id }}, '{{ $employee->name }}')" class="inline-flex items-center justify-center w-8 h-8 text-danger-600 bg-danger-50 hover:bg-danger-100 hover:text-danger-700 rounded-lg transition-all duration-200 hover:scale-110" title="حذف">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection