<div class="flex items-center gap-2">
    <button onclick="openEditModal({{ $id }}, {{ $data }})" class="inline-flex items-center justify-center w-8 h-8 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 rounded-lg transition-all duration-200 hover:scale-110" title="تعديل">
        <i data-lucide="edit-3" class="w-4 h-4"></i>
    </button>
    <button onclick="openDeleteModal({{ $id }}, '{{ $name }}')" class="inline-flex items-center justify-center w-8 h-8 text-danger-600 bg-danger-50 hover:bg-danger-100 hover:text-danger-700 rounded-lg transition-all duration-200 hover:scale-110" title="حذف">
        <i data-lucide="trash" class="w-4 h-4"></i>
    </button>
</div>