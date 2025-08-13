@extends('layouts.dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي القضايا</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['total'] }}</p>
            </div>
            <i data-lucide="scale" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">قضايا نشطة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['active'] }}</p>
            </div>
            <i data-lucide="gavel" class="w-8 h-8 text-warning-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">قضايا مكسوبة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['won'] }}</p>
            </div>
            <i data-lucide="trophy" class="w-8 h-8 text-success-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">قضايا معلقة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['pending'] }}</p>
            </div>
            <i data-lucide="clock" class="w-8 h-8 text-danger-500"></i>
        </div>
    </div>
</div>

<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
    <div class="p-6 border-b border-secondary-200">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-secondary-800">قائمة القضايا</h3>
            <button onclick="openAddModal()" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                إضافة قضية
            </button>
        </div>
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث في القضايا..." class="flex-1 px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <button type="submit" class="bg-secondary-500 hover:bg-secondary-600 text-white px-4 py-2 rounded-lg">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secondary-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">عنوان القضية</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">العميل</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">نوع القضية</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">المحكمة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الحالة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الجلسة القادمة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-secondary-200">
                @foreach($cases as $case)
                <tr class="hover:bg-secondary-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-secondary-900">{{ $case->title }}</div>
                        <div class="text-sm text-secondary-500">رقم: {{ $case->case_number }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $case->client_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $case->case_type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $case->court }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($case->status == 'نشطة') bg-warning-100 text-warning-800
                            @elseif($case->status == 'مكسوبة') bg-success-100 text-success-800
                            @elseif($case->status == 'مخسورة') bg-danger-100 text-danger-800
                            @else bg-secondary-100 text-secondary-800 @endif">
                            {{ $case->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">
                        {{ $case->next_hearing ? $case->next_hearing->format('Y-m-d') : 'غير محدد' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <button onclick="openEditModal({{ $case->id }}, '{{ $case->title }}', '{{ $case->description }}', '{{ $case->case_type }}', '{{ $case->status }}', '{{ $case->client_name }}', '{{ $case->court }}', '{{ $case->case_number }}', '{{ $case->filing_date->format('Y-m-d') }}', '{{ $case->next_hearing ? $case->next_hearing->format('Y-m-d') : '' }}')" class="inline-flex items-center justify-center w-8 h-8 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 rounded-lg transition-all duration-200 hover:scale-110" title="تعديل">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $case->id }}, '{{ $case->title }}')" class="inline-flex items-center justify-center w-8 h-8 text-danger-600 bg-danger-50 hover:bg-danger-100 hover:text-danger-700 rounded-lg transition-all duration-200 hover:scale-110" title="حذف">
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

<!-- Add Modal -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">إضافة قضية جديدة</h3>
                <form method="POST" action="/legal">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="title" placeholder="عنوان القضية" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="client_name" placeholder="اسم العميل" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select name="case_type" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="">نوع القضية</option>
                            <option value="مدني">مدني</option>
                            <option value="جنائي">جنائي</option>
                            <option value="تجاري">تجاري</option>
                            <option value="عمالي">عمالي</option>
                            <option value="عقاري">عقاري</option>
                        </select>
                        <input type="text" name="court" placeholder="المحكمة" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="case_number" placeholder="رقم القضية" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" name="filing_date" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" name="next_hearing" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    </div>
                    <textarea name="description" placeholder="وصف القضية" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 mt-4" rows="3"></textarea>
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
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">تعديل القضية</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" id="editTitle" name="title" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editClientName" name="client_name" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editCaseType" name="case_type" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="مدني">مدني</option>
                            <option value="جنائي">جنائي</option>
                            <option value="تجاري">تجاري</option>
                            <option value="عمالي">عمالي</option>
                            <option value="عقاري">عقاري</option>
                        </select>
                        <select id="editStatus" name="status" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="نشطة">نشطة</option>
                            <option value="معلقة">معلقة</option>
                            <option value="مكسوبة">مكسوبة</option>
                            <option value="مخسورة">مخسورة</option>
                        </select>
                        <input type="text" id="editCourt" name="court" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editCaseNumber" name="case_number" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" id="editFilingDate" name="filing_date" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" id="editNextHearing" name="next_hearing" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    </div>
                    <textarea id="editDescription" name="description" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 mt-4" rows="3"></textarea>
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
                        <p class="text-secondary-600">هل أنت متأكد من حذف <span id="deleteCaseName" class="font-semibold"></span>؟</p>
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

function openEditModal(id, title, description, caseType, status, clientName, court, caseNumber, filingDate, nextHearing) {
    document.getElementById('editForm').action = '/legal/' + id;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;
    document.getElementById('editCaseType').value = caseType;
    document.getElementById('editStatus').value = status;
    document.getElementById('editClientName').value = clientName;
    document.getElementById('editCourt').value = court;
    document.getElementById('editCaseNumber').value = caseNumber;
    document.getElementById('editFilingDate').value = filingDate;
    document.getElementById('editNextHearing').value = nextHearing;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(id, title) {
    document.getElementById('deleteForm').action = '/legal/' + id;
    document.getElementById('deleteCaseName').textContent = title;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection