<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'أحمد محمد', 'email' => 'ahmed@company.sy', 'phone' => '0933123456', 'department' => 'دراسة المشاريع', 'position' => 'مدير المشاريع', 'salary' => 150000, 'hire_date' => '2023-01-15', 'status' => 'نشط'],
            ['name' => 'فاطمة علي', 'email' => 'fatima@company.sy', 'phone' => '0944234567', 'department' => 'قانوني', 'position' => 'مستشار قانوني', 'salary' => 120000, 'hire_date' => '2023-02-20', 'status' => 'نشط'],
            ['name' => 'محمد حسن', 'email' => 'mohammed@company.sy', 'phone' => '0955345678', 'department' => 'موارد بشرية', 'position' => 'مدير الموارد البشرية', 'salary' => 140000, 'hire_date' => '2023-03-10', 'status' => 'نشط'],
            ['name' => 'سارة أحمد', 'email' => 'sara@company.sy', 'phone' => '0966456789', 'department' => 'تقني', 'position' => 'مهندس تقني', 'salary' => 110000, 'hire_date' => '2023-04-05', 'status' => 'نشط'],
            ['name' => 'خالد يوسف', 'email' => 'khaled@company.sy', 'phone' => '0977567890', 'department' => 'مستودعات', 'position' => 'مدير المستودع', 'salary' => 100000, 'hire_date' => '2023-05-12', 'status' => 'نشط'],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}