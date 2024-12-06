<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all categories
        $categories = Category::all();

        // Ensure there are categories to associate products with
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please run CategorySeeder first.');
            return;
        }

        // Define products
        $products = [
            // Baklava Products
            [
                'name_en' => 'Classic Pistachio Baklava',
                'name_ar' => 'بقلاوة الفستق الكلاسيكية',
                'description_en' => 'Traditional baklava with layers of filo pastry and pistachios.',
                'description_ar' => 'بقلاوة تقليدية بطبقات من الفيلو والمكسرات الفستق.',
                'price' => 12.99,
                'image' => 'assets/img/products/baklava_pistachio.jpg',
            ],
            [
                'name_en' => 'Walnut Baklava',
                'name_ar' => 'بقلاوة الجوز',
                'description_en' => 'Rich baklava filled with crunchy walnuts.',
                'description_ar' => 'بقلاوة غنية محشوة بالجوز المقرمش.',
                'price' => 11.99,
                'image' => 'assets/img/products/baklava_walnut.jpg',
            ],
            [
                'name_en' => 'Mixed Nut Baklava',
                'name_ar' => 'بقلاوة المكسرات المشكلة',
                'description_en' => 'A delightful mix of pistachios, walnuts, and almonds in baklava.',
                'description_ar' => 'خلطة لذيذة من الفستق والجوز واللوز في البقلاوة.',
                'price' => 13.99,
                'image' => 'assets/img/products/baklava_mixed.jpg',
            ],
            [
                'name_en' => 'Chocolate Baklava',
                'name_ar' => 'بقلاوة الشوكولاتة',
                'description_en' => 'A modern twist on traditional baklava with chocolate layers.',
                'description_ar' => 'لمسة عصرية على البقلاوة التقليدية بطبقات الشوكولاتة.',
                'price' => 14.99,
                'image' => 'assets/img/products/baklava_chocolate.jpg',
            ],

            // Kunafa Products
            [
                'name_en' => 'Cheese Kunafa',
                'name_ar' => 'كنافة الجبن',
                'description_en' => 'Creamy cheese layered with crispy kunafa dough and sweet syrup.',
                'description_ar' => 'جبن كريمي بطبقات من عجينة الكنافة المقرمشة وشراب حلو.',
                'price' => 10.99,
                'image' => 'assets/img/products/kunafa_cheese.jpg',
            ],
            [
                'name_en' => 'Cream Kunafa',
                'name_ar' => 'كنافة الكريم',
                'description_en' => 'Rich kunafa with layers of creamy filling.',
                'description_ar' => 'كنافة غنية بطبقات حشو كريمي.',
                'price' => 11.99,
                'image' => 'assets/img/products/kunafa_cream.jpg',
            ],
            [
                'name_en' => 'Chocolate Kunafa',
                'name_ar' => 'كنافة الشوكولاتة',
                'description_en' => 'Decadent kunafa with a chocolate-infused syrup.',
                'description_ar' => 'كنافة فاخرة مع شراب معزز بالشوكولاتة.',
                'price' => 12.99,
                'image' => 'assets/img/products/kunafa_chocolate.jpg',
            ],
            [
                'name_en' => 'Nutella Kunafa',
                'name_ar' => 'كنافة نوتيلا',
                'description_en' => 'A delightful blend of kunafa and Nutella for a rich taste.',
                'description_ar' => 'مزيج رائع من الكنافة ونوتيلا لمذاق غني.',
                'price' => 13.99,
                'image' => 'assets/img/products/kunafa_nutella.jpg',
            ],

            // Basbousa Products
            [
                'name_en' => 'Classic Basbousa',
                'name_ar' => 'البسبوسة الكلاسيكية',
                'description_en' => 'Traditional semolina cake soaked in sweet syrup.',
                'description_ar' => 'كعكة السميد التقليدية منقوعة في شراب حلو.',
                'price' => 8.99,
                'image' => 'assets/img/products/basbousa_classic.jpg',
            ],
            [
                'name_en' => 'Coconut Basbousa',
                'name_ar' => 'بسبوسة جوز الهند',
                'description_en' => 'Basbousa infused with coconut flakes for added flavor.',
                'description_ar' => 'بسبوسة معززة برقائق جوز الهند لإضافة نكهة.',
                'price' => 9.99,
                'image' => 'assets/img/products/basbousa_coconut.jpg',
            ],
            [
                'name_en' => 'Almond Basbousa',
                'name_ar' => 'بسبوسة اللوز',
                'description_en' => 'Delicious basbousa topped with toasted almonds.',
                'description_ar' => 'بسبوسة لذيذة مغطاة باللوز المحمص.',
                'price' => 10.99,
                'image' => 'assets/img/products/basbousa_almond.jpg',
            ],
            [
                'name_en' => 'Chocolate Basbousa',
                'name_ar' => 'بسبوسة الشوكولاتة',
                'description_en' => 'A sweet twist on basbousa with rich chocolate flavor.',
                'description_ar' => 'تحريف حلو على البسبوسة بنكهات الشوكولاتة الغنية.',
                'price' => 11.99,
                'image' => 'assets/img/products/basbousa_chocolate.jpg',
            ],

            // Maamoul Products
            [
                'name_en' => 'Date Maamoul',
                'name_ar' => 'المعمول بالتمر',
                'description_en' => 'Traditional maamoul filled with sweet dates.',
                'description_ar' => 'معمول تقليدي محشو بالتمر الحلو.',
                'price' => 5.99,
                'image' => 'assets/img/products/maamoul_date.jpg',
            ],
            [
                'name_en' => 'Pistachio Maamoul',
                'name_ar' => 'المعمول بالفستق',
                'description_en' => 'Maamoul filled with crunchy pistachios.',
                'description_ar' => 'معمول محشو بالفستق المقرمش.',
                'price' => 6.99,
                'image' => 'assets/img/products/maamoul_pistachio.jpg',
            ],
            [
                'name_en' => 'Walnut Maamoul',
                'name_ar' => 'المعمول بالجوز',
                'description_en' => 'Delicious maamoul with rich walnut filling.',
                'description_ar' => 'معمول لذيذ بحشوة الجوز الغنية.',
                'price' => 6.99,
                'image' => 'assets/img/products/maamoul_walnut.jpg',
            ],
            [
                'name_en' => 'Chocolate Maamoul',
                'name_ar' => 'المعمول بالشوكولاتة',
                'description_en' => 'A modern take on maamoul with chocolate filling.',
                'description_ar' => 'نظرة عصرية على المعمول بحشوة الشوكولاتة.',
                'price' => 7.99,
                'image' => 'assets/img/products/maamoul_chocolate.jpg',
            ],

            // Halva Products
            [
                'name_en' => 'Sesame Halva',
                'name_ar' => 'الحلاوة الطحينية',
                'description_en' => 'Traditional sesame-based halva with a crumbly texture.',
                'description_ar' => 'حلاوة تقليدية تعتمد على السمسم مع قوام متفتت.',
                'price' => 4.99,
                'image' => 'assets/img/products/halva_sesame.jpg',
            ],
            [
                'name_en' => 'Chocolate Halva',
                'name_ar' => 'الحلاوة بالشوكولاتة',
                'description_en' => 'Rich halva infused with chocolate for a delightful taste.',
                'description_ar' => 'حلاوة غنية معززة بالشوكولاتة لمذاق رائع.',
                'price' => 5.99,
                'image' => 'assets/img/products/halva_chocolate.jpg',
            ],
            [
                'name_en' => 'Pistachio Halva',
                'name_ar' => 'الحلاوة بالفستق',
                'description_en' => 'Creamy halva topped with crunchy pistachios.',
                'description_ar' => 'حلاوة كريمية مغطاة بالفستق المقرمش.',
                'price' => 5.99,
                'image' => 'assets/img/products/halva_pistachio.jpg',
            ],
            [
                'name_en' => 'Coconut Halva',
                'name_ar' => 'الحلاوة بجوز الهند',
                'description_en' => 'Halva with a delightful coconut flavor.',
                'description_ar' => 'حلاوة بنكهات جوز الهند الرائعة.',
                'price' => 5.99,
                'image' => 'assets/img/products/halva_coconut.jpg',
            ],
            [
                'name_en' => 'Almond Halva',
                'name_ar' => 'الحلاوة باللوز',
                'description_en' => 'Delicious halva infused with almond flavor.',
                'description_ar' => 'حلاوة لذيذة معززة بنكهات اللوز.',
                'price' => 5.99,
                'image' => 'assets/img/products/halva_almond.jpg',
            ],
        ];

        // Distribute products across categories
        foreach ($products as $productData) {
            // Determine the category based on the product's name_en
            if (strpos($productData['name_en'], 'Baklava') !== false) {
                $category = $categories->where('name_en', 'Baklava')->first();
            } elseif (strpos($productData['name_en'], 'Kunafa') !== false) {
                $category = $categories->where('name_en', 'Kunafa')->first();
            } elseif (strpos($productData['name_en'], 'Basbousa') !== false) {
                $category = $categories->where('name_en', 'Basbousa')->first();
            } elseif (strpos($productData['name_en'], 'Maamoul') !== false) {
                $category = $categories->where('name_en', 'Maamoul')->first();
            } elseif (strpos($productData['name_en'], 'Halva') !== false) {
                $category = $categories->where('name_en', 'Halva')->first();
            } else {
                // Default to first category if no match found
                $category = $categories->first();
            }

            // Create the product
            Product::create([
                'name_en' => $productData['name_en'],
                'name_ar' => $productData['name_ar'],
                'description_en' => $productData['description_en'],
                'description_ar' => $productData['description_ar'],
                'image' => $productData['image'],
                'price' => $productData['price'],
                'category_id' => $category->id,
            ]);
        }
    }
}