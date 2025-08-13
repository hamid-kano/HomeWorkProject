@extends('layouts.dashboard')

@section('title', 'القسم التقني')
@section('page-title', 'القسم التقني')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي المعدات</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['total'] }}</p>
            </div>
            <i data-lucide="wrench" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">تعمل بشكل طبيعي</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['active'] }}</p>
            </div>
            <i data-lucide="check-circle" class="w-8 h-8 text-success-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">تحت الصيانة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['maintenance'] }}</p>
            </div>
            <i data-lucide="settings" class="w-8 h-8 text-warning-500"></i>
        </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي التكلفة</p>
                <p class="text-2xl font-bold text-secondary-900">{{ number_format($stats['total_cost']) }} ل.س</p>
            </div>
            <i data-lucide="dollar-sign" class="w-8 h-8 text-primary-500"></i>
        </div>
    </div>
</div>

<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
    <div class="p-6 border-b border-secondary-200">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-secondary-800">قائمة المعدات التقنية</h3>
            <button onclick="openAddModal()" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                إضافة معدة
            </button>
        </div>
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="بحث في المعدات..." class="flex-1 px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            <button type="submit" class="bg-secondary-500 hover:bg-secondary-600 text-white px-4 py-2 rounded-lg">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secondary-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">اسم المعدة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">النوع</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الموديل</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الموقع</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الحالة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">التكلفة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-secondary-500 uppercase">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-secondary-200">
                @foreach($equipment as $item)
                <tr class="hover:bg-secondary-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-secondary-900">{{ $item->name }}</div>
                        <div class="text-sm text-secondary-500">{{ $item->serial_number }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $item->type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $item->model }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ $item->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($item->status == 'يعمل') bg-success-100 text-success-800
                            @elseif($item->status == 'صيانة') bg-warning-100 text-warning-800
                            @elseif($item->status == 'معطل') bg-danger-100 text-danger-800
                            @else bg-secondary-100 text-secondary-800 @endif">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-900">{{ number_format($item->cost) }} ل.س</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <button onclick="openEditModal({{ $item->id }}, '{{ $item->name }}', '{{ $item->type }}', '{{ $item->model }}', '{{ $item->serial_number }}', '{{ $item->purchase_date }}', '{{ $item->warranty_date }}', '{{ $item->location }}', {{ $item->cost }}, '{{ $item->supplier }}', '{{ $item->maintenance_schedule }}', '{{ $item->status }}', '{{ $item->notes }}')" class="inline-flex items-center justify-center w-8 h-8 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 rounded-lg transition-all duration-200 hover:scale-110" title="تعديل">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $item->id }}, '{{ $item->name }}')" class="inline-flex items-center justify-center w-8 h-8 text-danger-600 bg-danger-50 hover:bg-danger-100 hover:text-danger-700 rounded-lg transition-all duration-200 hover:scale-110" title="حذف">
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
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">إضافة معدة تقنية جديدة</h3>
                <form method="POST" action="/technical">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="name" placeholder="اسم المعدة" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select name="type" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="">اختر النوع</option>
                            <option value="حاسوب">حاسوب</option>
                            <option value="طابعة">طابعة</option>
                            <option value="شاشة">شاشة</option>
                            <option value="خادم">خادم</option>
                            <option value="شبكة">معدات شبكة</option>
                            <option value="أمان">أنظمة أمان</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                        <input type="text" name="model" placeholder="الموديل" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="serial_number" placeholder="الرقم التسلسلي" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" name="purchase_date" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" name="warranty_date" placeholder="تاريخ انتهاء الضمان" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="location" placeholder="الموقع" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="number" name="cost" placeholder="التكلفة" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="supplier" placeholder="المورد" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" name="maintenance_schedule" placeholder="جدولة الصيانة" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    </div>
                    <textarea name="notes" placeholder="ملاحظات" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 mt-4"></textarea>
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
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-secondary-900 mb-4">تعديل المعدة التقنية</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" id="editName" name="name" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editType" name="type" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="حاسوب">حاسوب</option>
                            <option value="طابعة">طابعة</option>
                            <option value="شاشة">شاشة</option>
                            <option value="خادم">خادم</option>
                            <option value="شبكة">معدات شبكة</option>
                            <option value="أمان">أنظمة أمان</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                        <input type="text" id="editModel" name="model" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editSerialNumber" name="serial_number" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" id="editPurchaseDate" name="purchase_date" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="date" id="editWarrantyDate" name="warranty_date" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editLocation" name="location" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="number" id="editCost" name="cost" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editSupplier" name="supplier" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <input type="text" id="editMaintenanceSchedule" name="maintenance_schedule" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                        <select id="editStatus" name="status" required class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="يعمل">يعمل</option>
                            <option value="صيانة">صيانة</option>
                            <option value="معطل">معطل</option>
                            <option value="مستبعد">مستبعد</option>
                        </select>
                    </div>
                    <textarea id="editNotes" name="notes" placeholder="ملاحظات" class="w-full px-4 py-2 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 mt-4"></textarea>
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
                        <p class="text-secondary-600">هل أنت متأكد من حذف <span id="deleteEquipmentName" class="font-semibold"></span>؟</p>
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

function openEditModal(id, name, type, model, serialNumber, purchaseDate, warrantyDate, location, cost, supplier, maintenanceSchedule, status, notes) {
    document.getElementById('editForm').action = '/technical/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editType').value = type;
    document.getElementById('editModel').value = model;
    document.getElementById('editSerialNumber').value = serialNumber;
    document.getElementById('editPurchaseDate').value = purchaseDate;
    document.getElementById('editWarrantyDate').value = warrantyDate || '';
    document.getElementById('editLocation').value = location;
    document.getElementById('editCost').value = cost;
    document.getElementById('editSupplier').value = supplier;
    document.getElementById('editMaintenanceSchedule').value = maintenanceSchedule || '';
    document.getElementById('editStatus').value = status;
    document.getElementById('editNotes').value = notes || '';
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(id, name) {
    document.getElementById('deleteForm').action = '/technical/' + id;
    document.getElementById('deleteEquipmentName').textContent = name;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection