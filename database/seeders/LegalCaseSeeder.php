<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LegalCase;

class LegalCaseSeeder extends Seeder
{
    public function run()
    {
        $cases = [
            [
                'title' => 'قضية تعويض أضرار',
                'description' => 'قضية تعويض عن أضرار مادية ومعنوية نتيجة حادث مروري',
                'case_type' => 'مدني',
                'status' => 'جاري',
                'client_name' => 'أحمد محمد الشامي',
                'court' => 'محكمة دمشق المدنية',
                'case_number' => 'MD-2024-001',
                'filing_date' => '2024-01-15',
                'next_hearing' => '2024-02-20'
            ],
            [
                'title' => 'قضية نزاع تجاري',
                'description' => 'نزاع حول عقد توريد بين شركتين',
                'case_type' => 'تجاري',
                'status' => 'مكتمل',
                'client_name' => 'شركة الشام للتجارة',
                'court' => 'المحكمة التجارية بحلب',
                'case_number' => 'CM-2023-045',
                'filing_date' => '2023-11-10',
                'next_hearing' => null
            ],
            [
                'title' => 'قضية عمالية',
                'description' => 'نزاع حول مستحقات نهاية الخدمة',
                'case_type' => 'عمالي',
                'status' => 'جاري',
                'client_name' => 'سارة أحمد الحموي',
                'court' => 'محكمة العمل بحماة',
                'case_number' => 'LB-2024-012',
                'filing_date' => '2024-01-05',
                'next_hearing' => '2024-02-15'
            ],
            [
                'title' => 'قضية جنائية',
                'description' => 'قضية احتيال مالي',
                'case_type' => 'جنائي',
                'status' => 'معلق',
                'client_name' => 'خالد عبدالله الحلبي',
                'court' => 'المحكمة الجزائية بدمشق',
                'case_number' => 'CR-2024-008',
                'filing_date' => '2024-01-20',
                'next_hearing' => '2024-03-01'
            ],
            [
                'title' => 'قضية أحوال شخصية',
                'description' => 'قضية حضانة أطفال',
                'case_type' => 'أحوال شخصية',
                'status' => 'جاري',
                'client_name' => 'فاطمة محمد الدمشقي',
                'court' => 'محكمة الأحوال الشخصية بدمشق',
                'case_number' => 'PS-2024-003',
                'filing_date' => '2024-01-12',
                'next_hearing' => '2024-02-25'
            ],
            [
                'title' => 'قضية عقارية',
                'description' => 'نزاع حول ملكية أرض',
                'case_type' => 'عقاري',
                'status' => 'مكتمل',
                'client_name' => 'عبدالرحمن صالح الحمصي',
                'court' => 'المحكمة العقارية بحمص',
                'case_number' => 'RE-2023-067',
                'filing_date' => '2023-09-15',
                'next_hearing' => null
            ],
            [
                'title' => 'قضية إدارية',
                'description' => 'طعن في قرار إداري',
                'case_type' => 'إداري',
                'status' => 'جاري',
                'client_name' => 'مؤسسة الفرات للاستثمار',
                'court' => 'محكمة القضاء الإداري بدمشق',
                'case_number' => 'AD-2024-015',
                'filing_date' => '2024-01-08',
                'next_hearing' => '2024-02-18'
            ],
            [
                'title' => 'قضية تأمين',
                'description' => 'نزاع مع شركة تأمين حول تعويض',
                'case_type' => 'تأمين',
                'status' => 'معلق',
                'client_name' => 'نورا عبدالعزيز اللاذقاني',
                'court' => 'محكمة اللاذقية المدنية',
                'case_number' => 'IN-2024-021',
                'filing_date' => '2024-01-25',
                'next_hearing' => '2024-03-10'
            ],
            [
                'title' => 'قضية ميراث',
                'description' => 'نزاع حول تقسيم الميراث',
                'case_type' => 'أحوال شخصية',
                'status' => 'جاري',
                'client_name' => 'محمد علي الطرطوسي',
                'court' => 'محكمة الأحوال الشخصية بطرطوس',
                'case_number' => 'PS-2024-018',
                'filing_date' => '2024-01-30',
                'next_hearing' => '2024-03-05'
            ],
            [
                'title' => 'قضية تجارية',
                'description' => 'نزاع حول عقد شراكة تجارية',
                'case_type' => 'تجاري',
                'status' => 'جاري',
                'client_name' => 'شركة بلاد الشام المحدودة',
                'court' => 'المحكمة التجارية بدمشق',
                'case_number' => 'CM-2024-032',
                'filing_date' => '2024-02-01',
                'next_hearing' => '2024-03-15'
            ]
        ];

        foreach ($cases as $case) {
            LegalCase::create($case);
        }
    }
}