<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index(Request $request)
    {
        if (!session('user')) return redirect('/login');
        
        $query = LegalCase::query();
        
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('client_name', 'like', '%' . $request->search . '%')
                  ->orWhere('case_number', 'like', '%' . $request->search . '%');
        }
        
        $cases = $query->latest()->get();
        $stats = [
            'total' => LegalCase::count(),
            'active' => LegalCase::where('status', 'نشطة')->count(),
            'won' => LegalCase::where('status', 'مكسوبة')->count(),
            'pending' => LegalCase::where('status', 'معلقة')->count()
        ];
        
        return view('legal.index', compact('cases', 'stats'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'case_type' => 'required|string',
                'client_name' => 'required|string',
                'court' => 'required|string',
                'case_number' => 'required|string',
                'filing_date' => 'required|date',
                'next_hearing' => 'nullable|date'
            ], [
                'title.required' => 'عنوان القضية مطلوب',
                'description.required' => 'وصف القضية مطلوب',
                'case_type.required' => 'نوع القضية مطلوب',
                'client_name.required' => 'اسم العميل مطلوب',
                'court.required' => 'المحكمة مطلوبة',
                'case_number.required' => 'رقم القضية مطلوب',
                'filing_date.required' => 'تاريخ رفع القضية مطلوب'
            ]);
            
            LegalCase::create(array_merge($request->all(), ['status' => 'نشطة']));
            return redirect()->back()->with('success', 'تم إضافة القضية "' . $request->title . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة القضية. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function update(Request $request, LegalCase $case)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'case_type' => 'required|string',
                'status' => 'required|string',
                'client_name' => 'required|string',
                'court' => 'required|string',
                'case_number' => 'required|string',
                'filing_date' => 'required|date',
                'next_hearing' => 'nullable|date'
            ]);
            
            $case->update($request->all());
            return redirect()->back()->with('success', 'تم تحديث القضية "' . $case->title . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث القضية. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function destroy(LegalCase $case)
    {
        try {
            $caseTitle = $case->title;
            $case->delete();
            return redirect()->back()->with('success', 'تم حذف القضية "' . $caseTitle . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف القضية. يرجى المحاولة مرة أخرى.');
        }
    }
}