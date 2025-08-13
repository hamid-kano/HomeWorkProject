<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if (!session('user')) return redirect('/login');
        
        $query = Employee::query();
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('department', 'like', '%' . $request->search . '%');
        }
        
        $employees = $query->latest()->get();
        $stats = [
            'total' => Employee::count(),
            'active' => Employee::where('status', 'نشط')->count(),
            'departments' => Employee::distinct('department')->count('department'),
            'total_salary' => Employee::where('status', 'نشط')->sum('salary')
        ];
        
        return view('hr.index', compact('employees', 'stats'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:employees',
                'phone' => 'required|string',
                'department' => 'required|string',
                'position' => 'required|string',
                'salary' => 'required|numeric|min:0',
                'hire_date' => 'required|date'
            ], [
                'name.required' => 'اسم الموظف مطلوب',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'email.unique' => 'هذا البريد الإلكتروني مستخدم مسبقاً',
                'phone.required' => 'رقم الهاتف مطلوب',
                'department.required' => 'القسم مطلوب',
                'position.required' => 'المنصب مطلوب',
                'salary.required' => 'الراتب مطلوب',
                'salary.numeric' => 'الراتب يجب أن يكون رقم',
                'salary.min' => 'الراتب يجب أن يكون أكبر من صفر',
                'hire_date.required' => 'تاريخ التوظيف مطلوب',
                'hire_date.date' => 'تاريخ التوظيف غير صحيح'
            ]);
            
            Employee::create(array_merge($request->all(), ['status' => 'نشط']));
            return redirect()->back()->with('success', 'تم إضافة الموظف "' . $request->name . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة الموظف. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string',
            'department' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'status' => 'required|string'
        ]);
        
        $employee->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث بيانات الموظف بنجاح');
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with('success', 'تم حذف الموظف بنجاح');
    }
}
