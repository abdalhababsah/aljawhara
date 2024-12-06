<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Baklava',
                'name_ar' => 'البقلاوة',
                'description_en' => 'A rich, sweet pastry made of layers of filo filled with chopped nuts and sweetened with syrup or honey.',
                'description_ar' => 'معجنات غنية وحلوة مصنوعة من طبقات من الفيلو محشوة بالمكسرات المفرومة ومحلاة بالشراب أو العسل.',
                'image' => 'assets/img/categories/baklava.jpg', // Ensure this image exists or adjust the path
            ],
            [
                'name_en' => 'Kunafa',
                'name_ar' => 'الكنافة',
                'description_en' => 'A traditional Middle Eastern dessert made with thin noodle-like pastry or semolina dough, soaked in sweet sugar-based syrup.',
                'description_ar' => 'حلوى تقليدية شرق أوسطية مصنوعة من عجينة رقيقة تشبه الشعرية أو السميد، منقوعة في شراب سكر حلو.',
                'image' => 'assets/img/categories/kunafa.jpg',
            ],
            [
                'name_en' => 'Basbousa',
                'name_ar' => 'البسبوسة',
                'description_en' => 'A sweet, semolina-based cake soaked in syrup, often flavored with coconut or almonds.',
                'description_ar' => 'كعكة حلوة تعتمد على السميد منقوعة في شراب، غالبًا ما تكون بنكهة جوز الهند أو اللوز.',
                'image' => 'assets/img/categories/basbousa.jpg',
            ],
            [
                'name_en' => 'Maamoul',
                'name_ar' => 'المعمول',
                'description_en' => 'A shortbread pastry filled with dates, pistachios, or walnuts, traditionally made during Eid and other celebrations.',
                'description_ar' => 'معجنات قصيرة محشوة بالتمر أو الفستق أو الجوز، تصنع تقليديًا خلال عيد الفطر وغيره من الاحتفالات.',
                'image' => 'assets/img/categories/maamoul.jpg',
            ],
            [
                'name_en' => 'Halva',
                'name_ar' => 'الحلاوة',
                'description_en' => 'A dense, sweet confection made from tahini (sesame paste) or other nut butters, often flavored with vanilla or cocoa.',
                'description_ar' => 'حلويات كثيفة وحلوة مصنوعة من الطحينة أو زبدة المكسرات الأخرى، غالبًا ما تكون بنكهة الفانيليا أو الكاكاو.',
                'image' => 'assets/img/categories/halva.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}