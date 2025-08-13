<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['name' => 'مشروع مجمع سكني الياسمين', 'description' => 'بناء مجمع سكني يتكون من 50 شقة في منطقة الياسمين', 'budget' => 5000000, 'status' => 'قيد التنفيذ', 'start_date' => '2024-01-15', 'end_date' => '2024-12-31', 'location' => 'دمشق - الياسمين'],
            ['name' => 'مشروع مطعم الشام', 'description' => 'إنشاء مطعم للمأكولات الشامية التراثية', 'budget' => 800000, 'status' => 'معتمد', 'start_date' => '2024-03-01', 'end_date' => '2024-08-30', 'location' => 'دمشق - المزة'],
            ['name' => 'مشروع توريد مواد غذائية', 'description' => 'توريد مواد غذائية للمطاعم والفنادق', 'budget' => 2000000, 'status' => 'مكتمل', 'start_date' => '2023-06-01', 'end_date' => '2023-12-31', 'location' => 'دمشق - المنطقة الصناعية'],
            ['name' => 'مشروع مركز تجاري', 'description' => 'بناء مركز تجاري متعدد الطوابق', 'budget' => 8000000, 'status' => 'دراسة', 'start_date' => null, 'end_date' => null, 'location' => 'دمشق - كفرسوسة'],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}