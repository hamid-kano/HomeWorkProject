<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'status' => 'required|string',
            'location' => 'required|string'
        ]);
        
        Project::create($request->all());
        return redirect()->back()->with('success', 'تم إضافة المشروع بنجاح');
    }
    
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'status' => 'required|string',
            'location' => 'required|string'
        ]);
        
        $project->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث المشروع بنجاح');
    }
    
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'تم حذف المشروع بنجاح');
    }
}
