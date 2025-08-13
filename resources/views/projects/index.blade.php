@extends('layouts.dashboard')

@section('title', 'دراسة المشاريع')
@section('page-title', 'دراسة المشاريع')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي المشاريع</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['total'] }}</p>
            </div>
            <i data-lucide="clipboard-list" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">قيد التنفيذ</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['active'] }}</p>
            </div>
            <i data-lucide="play-circle" class="w-8 h-8 text-warning-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">مكتملة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['completed'] }}</p>
            </div>
            <i data-lucide="check-circle" class="w-8 h-8 text-success-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الميزانية</p>
                <p class="text-2xl font-bold text-secondary-900">{{ number_format($stats['budget']) }} ل.س</p>
            </div>
            <i data-lucide="dollar-sign" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
</div>

<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
    <div class="p-6 border-b border-secondary-200">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-secondary-800">قائمة المشاريع</h3>
            <button onclick="openAddModal()" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                إضافة مشروع
            </button>
        </div>
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث في المشاريع..." class="flex-1 px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <button type="submit" class="bg-secondary-500 hover:bg-secondary-600 text-white px-4 py-2 rounded-lg">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secondary-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">اسم المشروع</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الميزانية</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الحالة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الموقع</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-secondary-200">
                @foreach($projects as $project)
                <tr class="hover:bg-secondary-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-secondary-900">{{ $project->name }}</div>
                        <div class="text-sm text-secondary-500">{{ Str::limit($project->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">
                        {{ number_format($project->budget) }} ل.س
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($project->status == 'مكتمل') bg-success-100 text-success-800
                            @elseif($project->status == 'قيد التنفيذ') bg-primary-100 text-primary-800
                            @elseif($project->status == 'دراسة') bg-warning-100 text-warning-800
                            @else bg-secondary-100 text-secondary-800 @endif">
                            {{ $project->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $project->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="openEditModal({{ $project->id }}, '{{ $project->name }}', '{{ $project->description }}', {{ $project->budget }}, '{{ $project->status }}', '{{ $project->location }}')" class="text-primary-600 hover:text-primary-900 mr-3">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </button>
                        <button onclick="openDeleteModal({{ $project->id }}, '{{ $project->name }}')" class="text-danger-600 hover:text-danger-900">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">إضافة مشروع جديد</h3>
                <form method="POST" action="/projects">
                    @csrf
                    <div class="space-y-4">
                        <input type="text" name="name" placeholder="اسم المشروع" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <textarea name="description" placeholder="وصف المشروع" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500"></textarea>
                        <input type="number" name="budget" placeholder="الميزانية" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select name="status" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="">اختر الحالة</option>
                            <option value="دراسة">دراسة</option>
                            <option value="معتمد">معتمد</option>
                            <option value="قيد التنفيذ">قيد التنفيذ</option>
                            <option value="مكتمل">مكتمل</option>
                        </select>
                        <input type="text" name="location" placeholder="الموقع" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div class="flex gap-3 mt-6">
                        <button type="submit" class="flex-1 bg-primary-500 hover:bg-primary-600 text-white py-2 rounded-lg">إضافة</button>
                        <button type="button" onclick="closeAddModal()" class="flex-1 bg-secondary-500 hover:bg-secondary-600 text-white py-2 rounded-lg">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">تعديل المشروع</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <input type="text" id="editName" name="name" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <textarea id="editDescription" name="description" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500"></textarea>
                        <input type="number" id="editBudget" name="budget" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editStatus" name="status" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="دراسة">دراسة</option>
                            <option value="معتمد">معتمد</option>
                            <option value="قيد التنفيذ">قيد التنفيذ</option>
                            <option value="مكتمل">مكتمل</option>
                        </select>
                        <input type="text" id="editLocation" name="location" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div class="flex gap-3 mt-6">
                        <button type="submit" class="flex-1 bg-primary-500 hover:bg-primary-600 text-white py-2 rounded-lg">حفظ</button>
                        <button type="button" onclick="closeEditModal()" class="flex-1 bg-secondary-500 hover:bg-secondary-600 text-white py-2 rounded-lg">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-danger-100 rounded-full flex items-center justify-center">
                        <i data-lucide="alert-triangle" class="w-6 h-6 text-danger-600"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-secondary-900">تأكيد الحذف</h3>
                        <p class="text-secondary-600">هل أنت متأكد من حذف <span id="deleteProjectName" class="font-semibold"></span>؟</p>
                    </div>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 bg-danger-500 hover:bg-danger-600 text-white py-2 rounded-lg">حذف</button>
                        <button type="button" onclick="closeDeleteModal()" class="flex-1 bg-secondary-500 hover:bg-secondary-600 text-white py-2 rounded-lg">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

function openEditModal(id, name, description, budget, status, location) {
    document.getElementById('editForm').action = '/projects/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description;
    document.getElementById('editBudget').value = budget;
    document.getElementById('editStatus').value = status;
    document.getElementById('editLocation').value = location;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(id, name) {
    document.getElementById('deleteForm').action = '/projects/' + id;
    document.getElementById('deleteProjectName').textContent = name;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection