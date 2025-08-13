<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechnicalEquipment;

class TechnicalEquipmentSeeder extends Seeder
{
    public function run()
    {
        $equipment = [
            [
                'name' => 'حاسوب مكتبي - إدارة',
                'type' => 'حاسوب',
                'model' => 'Dell OptiPlex 7090',
                'serial_number' => 'DL001SY2024',
                'purchase_date' => '2024-01-15',
                'warranty_date' => '2027-01-15',
                'status' => 'يعمل',
                'location' => 'مكتب المدير العام',
                'cost' => 2500000,
                'supplier' => 'شركة التقنية المتقدمة',
                'maintenance_schedule' => 'كل 6 أشهر',
                'notes' => 'مواصفات عالية للمهام الإدارية'
            ],
            [
                'name' => 'طابعة ليزر ملونة',
                'type' => 'طابعة',
                'model' => 'HP LaserJet Pro M454dn',
                'serial_number' => 'HP002SY2024',
                'purchase_date' => '2024-02-01',
                'warranty_date' => '2026-02-01',
                'status' => 'يعمل',
                'location' => 'قسم الموارد البشرية',
                'cost' => 1200000,
                'supplier' => 'مؤسسة الحلول التقنية',
                'maintenance_schedule' => 'كل 3 أشهر',
                'notes' => 'للطباعة الملونة والوثائق الرسمية'
            ],
            [
                'name' => 'خادم قاعدة البيانات',
                'type' => 'خادم',
                'model' => 'Dell PowerEdge R750',
                'serial_number' => 'SRV001SY2024',
                'purchase_date' => '2023-12-10',
                'warranty_date' => '2026-12-10',
                'status' => 'يعمل',
                'location' => 'غرفة الخوادم',
                'cost' => 8500000,
                'supplier' => 'شركة الشام للتقنية',
                'maintenance_schedule' => 'شهرياً',
                'notes' => 'خادم رئيسي لقاعدة البيانات'
            ],
            [
                'name' => 'شاشة عرض كبيرة',
                'type' => 'شاشة',
                'model' => 'Samsung 55" 4K',
                'serial_number' => 'SM001SY2024',
                'purchase_date' => '2024-01-20',
                'warranty_date' => '2026-01-20',
                'status' => 'يعمل',
                'location' => 'قاعة الاجتماعات',
                'cost' => 1800000,
                'supplier' => 'مركز الإلكترونيات الحديثة',
                'maintenance_schedule' => 'كل 6 أشهر',
                'notes' => 'للعروض التقديمية والاجتماعات'
            ],
            [
                'name' => 'راوتر شبكة رئيسي',
                'type' => 'شبكة',
                'model' => 'Cisco ISR 4331',
                'serial_number' => 'CS001SY2024',
                'purchase_date' => '2023-11-15',
                'warranty_date' => '2026-11-15',
                'status' => 'يعمل',
                'location' => 'غرفة الشبكات',
                'cost' => 3200000,
                'supplier' => 'شركة الاتصالات المتطورة',
                'maintenance_schedule' => 'كل شهرين',
                'notes' => 'راوتر رئيسي للشبكة الداخلية'
            ],
            [
                'name' => 'نظام كاميرات المراقبة',
                'type' => 'أمان',
                'model' => 'Hikvision DS-7616NI',
                'serial_number' => 'HK001SY2024',
                'purchase_date' => '2024-01-05',
                'warranty_date' => '2027-01-05',
                'status' => 'يعمل',
                'location' => 'مبنى الشركة',
                'cost' => 4500000,
                'supplier' => 'شركة الأمان التقني',
                'maintenance_schedule' => 'كل 3 أشهر',
                'notes' => '16 كاميرا مراقبة عالية الدقة'
            ],
            [
                'name' => 'حاسوب محمول - مبيعات',
                'type' => 'حاسوب',
                'model' => 'Lenovo ThinkPad E15',
                'serial_number' => 'LN001SY2024',
                'purchase_date' => '2024-02-10',
                'warranty_date' => '2026-02-10',
                'status' => 'صيانة',
                'location' => 'قسم المبيعات',
                'cost' => 1800000,
                'supplier' => 'مؤسسة الحاسوب الذكي',
                'maintenance_schedule' => 'كل 4 أشهر',
                'notes' => 'تحت الصيانة - مشكلة في البطارية'
            ],
            [
                'name' => 'طابعة وثائق سريعة',
                'type' => 'طابعة',
                'model' => 'Brother HL-L2350DW',
                'serial_number' => 'BR001SY2024',
                'purchase_date' => '2024-01-25',
                'warranty_date' => '2026-01-25',
                'status' => 'يعمل',
                'location' => 'القسم القانوني',
                'cost' => 650000,
                'supplier' => 'شركة المكتب الحديث',
                'maintenance_schedule' => 'كل 4 أشهر',
                'notes' => 'طابعة سريعة للوثائق القانونية'
            ]
        ];

        foreach ($equipment as $item) {
            TechnicalEquipment::create($item);
        }
    }
}