<?php

namespace App\Http\Controllers;

use App\Models\TechnicalEquipment;
use Illuminate\Http\Request;

class TechnicalController extends Controller
{
    public function index(Request $request)
    {
        if (!session('user')) return redirect('/login');
        
        $query = TechnicalEquipment::query();
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('type', 'like', '%' . $request->search . '%')
                  ->orWhere('model', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
        }
        
        $equipment = $query->latest()->get();
        $stats = [
            'total' => TechnicalEquipment::count(),
            'active' => TechnicalEquipment::where('status', 'يعمل')->count(),
            'maintenance' => TechnicalEquipment::where('status', 'صيانة')->count(),
            'total_cost' => TechnicalEquipment::sum('cost')
        ];
        
        return view('technical.index', compact('equipment', 'stats'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string',
                'model' => 'required|string',
                'serial_number' => 'required|string|unique:technical_equipment',
                'purchase_date' => 'required|date',
                'cost' => 'required|numeric|min:0',
                'location' => 'required|string',
                'supplier' => 'required|string'
            ], [
                'name.required' => 'اسم المعدة مطلوب',
                'type.required' => 'نوع المعدة مطلوب',
                'model.required' => 'الموديل مطلوب',
                'serial_number.required' => 'الرقم التسلسلي مطلوب',
                'serial_number.unique' => 'هذا الرقم التسلسلي مستخدم مسبقاً',
                'purchase_date.required' => 'تاريخ الشراء مطلوب',
                'cost.required' => 'التكلفة مطلوبة',
                'cost.numeric' => 'التكلفة يجب أن تكون رقم',
                'location.required' => 'الموقع مطلوب',
                'supplier.required' => 'المورد مطلوب'
            ]);
            
            TechnicalEquipment::create(array_merge($request->all(), ['status' => 'يعمل']));
            return redirect()->back()->with('success', 'تم إضافة المعدة "' . $request->name . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة المعدة. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function update(Request $request, TechnicalEquipment $equipment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string|unique:technical_equipment,serial_number,' . $equipment->id,
            'purchase_date' => 'required|date',
            'cost' => 'required|numeric',
            'location' => 'required|string',
            'supplier' => 'required|string',
            'status' => 'required|string'
        ]);
        
        $equipment->update($request->only(['name', 'type', 'model', 'serial_number', 'purchase_date', 'warranty_date', 'cost', 'location', 'supplier', 'maintenance_schedule', 'status', 'notes']));
        return redirect()->back()->with('success', 'تم تحديث بيانات المعدة بنجاح');
    }
    
    public function destroy(TechnicalEquipment $equipment)
    {
        $equipment->delete();
        return redirect()->back()->with('success', 'تم حذف المعدة بنجاح');
    }
}