<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if (!session('user')) return redirect('/login');
        
        $query = Project::query();
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
        }
        
        $projects = $query->latest()->get();
        $stats = [
            'total' => Project::count(),
            'active' => Project::where('status', 'قيد التنفيذ')->count(),
            'completed' => Project::where('status', 'مكتمل')->count(),
            'budget' => Project::sum('budget')
        ];
        
        return view('projects.index', compact('projects', 'stats'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'budget' => 'required|numeric|min:0',
                'status' => 'required|string',
                'location' => 'required|string'
            ], [
                'name.required' => 'اسم المشروع مطلوب',
                'description.required' => 'وصف المشروع مطلوب',
                'budget.required' => 'الميزانية مطلوبة',
                'budget.numeric' => 'الميزانية يجب أن تكون رقم',
                'budget.min' => 'الميزانية يجب أن تكون أكبر من صفر',
                'status.required' => 'حالة المشروع مطلوبة',
                'location.required' => 'موقع المشروع مطلوب'
            ]);
            
            Project::create($request->all());
            return redirect()->back()->with('success', 'تم إضافة المشروع "' . $request->name . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة المشروع. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function update(Request $request, Project $project)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'budget' => 'required|numeric|min:0',
                'status' => 'required|string',
                'location' => 'required|string'
            ], [
                'name.required' => 'اسم المشروع مطلوب',
                'description.required' => 'وصف المشروع مطلوب',
                'budget.required' => 'الميزانية مطلوبة',
                'budget.numeric' => 'الميزانية يجب أن تكون رقم',
                'budget.min' => 'الميزانية يجب أن تكون أكبر من صفر',
                'status.required' => 'حالة المشروع مطلوبة',
                'location.required' => 'موقع المشروع مطلوب'
            ]);
            
            $project->update($request->all());
            return redirect()->back()->with('success', 'تم تحديث المشروع "' . $project->name . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث المشروع. يرجى المحاولة مرة أخرى.');
        }
    }
    
    public function destroy(Project $project)
    {
        try {
            $projectName = $project->name;
            $project->delete();
            return redirect()->back()->with('success', 'تم حذف المشروع "' . $projectName . '" بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف المشروع. يرجى المحاولة مرة أخرى.');
        }
    }
}
