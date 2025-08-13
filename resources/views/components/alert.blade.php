@if(session('success'))
<div id="successAlert" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-success-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 animate-bounce">
    <i data-lucide="check-circle" class="w-5 h-5"></i>
    <span>{{ session('success') }}</span>
    <button onclick="closeAlert('successAlert')" class="mr-2 hover:bg-success-600 rounded p-1">
        <i data-lucide="x" class="w-4 h-4"></i>
    </button>
</div>
@endif

@if(session('error'))
<div id="errorAlert" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-danger-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 animate-bounce">
    <i data-lucide="alert-circle" class="w-5 h-5"></i>
    <span>{{ session('error') }}</span>
    <button onclick="closeAlert('errorAlert')" class="mr-2 hover:bg-danger-600 rounded p-1">
        <i data-lucide="x" class="w-4 h-4"></i>
    </button>
</div>
@endif

@if($errors->any())
<div id="validationAlert" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-warning-500 text-white px-6 py-4 rounded-lg shadow-lg max-w-md animate-bounce">
    <div class="flex items-start gap-3">
        <i data-lucide="alert-triangle" class="w-5 h-5 mt-0.5"></i>
        <div class="flex-1">
            <p class="font-semibold mb-2">يرجى تصحيح الأخطاء التالية:</p>
            <ul class="text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button onclick="closeAlert('validationAlert')" class="hover:bg-warning-600 rounded p-1">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>
</div>
@endif

<script>
function closeAlert(alertId) {
    document.getElementById(alertId).remove();
}

setTimeout(() => {
    const alerts = ['successAlert', 'errorAlert', 'validationAlert'];
    alerts.forEach(alertId => {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translate(-50%, -100%)';
            setTimeout(() => alert.remove(), 300);
        }
    });
}, 5000);
</script>