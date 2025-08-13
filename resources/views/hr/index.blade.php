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

<!-- Add Employee Modal -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">إضافة موظف جديد</h3>
                <form method="POST" action="/hr">
                    @csrf
                    <div class="space-y-4">
                        <input type="text" name="name" placeholder="اسم الموظف" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="email" name="email" placeholder="البريد الإلكتروني" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="phone" placeholder="رقم الهاتف" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select name="department" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="">اختر القسم</option>
                            <option value="دراسة المشاريع">دراسة المشاريع</option>
                            <option value="قانوني">قانوني</option>
                            <option value="موارد بشرية">موارد بشرية</option>
                            <option value="تقني">تقني</option>
                            <option value="مستودعات">مستودعات</option>
                            <option value="نقاط بيع">نقاط بيع</option>
                            <option value="آليات">آليات</option>
                        </select>
                        <input type="text" name="position" placeholder="المنصب" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="number" name="salary" placeholder="الراتب" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" name="hire_date" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
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

<!-- Edit Employee Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">تعديل بيانات الموظف</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <input type="text" id="editName" name="name" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="email" id="editEmail" name="email" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editPhone" name="phone" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editDepartment" name="department" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="دراسة المشاريع">دراسة المشاريع</option>
                            <option value="قانوني">قانوني</option>
                            <option value="موارد بشرية">موارد بشرية</option>
                            <option value="تقني">تقني</option>
                            <option value="مستودعات">مستودعات</option>
                            <option value="نقاط بيع">نقاط بيع</option>
                            <option value="آليات">آليات</option>
                        </select>
                        <input type="text" id="editPosition" name="position" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="number" id="editSalary" name="salary" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editStatus" name="status" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="نشط">نشط</option>
                            <option value="معلق">معلق</option>
                            <option value="مستقيل">مستقيل</option>
                        </select>
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

<!-- Delete Employee Modal -->
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
                        <p class="text-secondary-600">هل أنت متأكد من حذف <span id="deleteEmployeeName" class="font-semibold"></span>؟</p>
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

function openEditModal(id, name, email, phone, department, position, salary, status) {
    document.getElementById('editForm').action = '/hr/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editPhone').value = phone;
    document.getElementById('editDepartment').value = department;
    document.getElementById('editPosition').value = position;
    document.getElementById('editSalary').value = salary;
    document.getElementById('editStatus').value = status;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(id, name) {
    document.getElementById('deleteForm').action = '/hr/' + id;
    document.getElementById('deleteEmployeeName').textContent = name;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection