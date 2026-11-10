<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'usertype' => 'admin',
                'is_premium' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'usertype' => 'user',
                'is_premium' => false,
            ]
        );

        $novel = Category::firstOrCreate(['categoryName' => 'Novel']);
        $selfHelp = Category::firstOrCreate(['categoryName' => 'Self-Help']);
        $philosophy = Category::firstOrCreate(['categoryName' => 'Philosophy']);
        $history = Category::firstOrCreate(['categoryName' => 'Biography & History']);

        $sampleBooks = [
            [
                'name' => 'ခင်ဗျားကို ကျွန်တော်ချစ်တယ်',
                'price' => 5000,
                'author' => 'စဝ်ခွန်ဇ',
                'description' => 'လူငယ်အချစ်ဝတ္ထုစာအုပ်ကောင်းတစ်အုပ် ဖြစ်ပြီး နှလုံးသားခံစားချက်များကို လှပစွာ ပုံဖော်ထားပါသည်။',
                'book_cover' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $novel->id,
                'booktype' => 'free',
            ],
            [
                'name' => 'ရေစက်တိုသည်လည်း တစ်ခါတစ်ရံ မဆုံသည်းသာ',
                'price' => 5500,
                'author' => 'လမင်းမိုမို',
                'description' => 'ဆုံဆည်းခွင့်နှင့် ကံကြမ္မာအကြောင်း ရေးဖွဲ့ထားသော နာမည်ကျော် မြန်မာဝတ္ထုရှည်။',
                'book_cover' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $novel->id,
                'booktype' => 'premiun',
            ],
            [
                'name' => 'ဘ၀အတွေးထဲမှဒဿနများ',
                'price' => 4500,
                'author' => 'အရှင်ဣဒ္ဓိပါလ(ရွှေသန္တာ)',
                'description' => 'နေ့စဉ်ဘဝတွင် စိတ်အေးချမ်းသာယာစေမည့် အတွေးအမြင်နှင့် ဒဿနစာစုများ။',
                'book_cover' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $philosophy->id,
                'booktype' => 'free',
            ],
            [
                'name' => 'အဖိုးတန်တဲ့လူအဖိုးတန်တဲ့ဘ၀',
                'price' => 6500,
                'author' => 'ညီညီနိုင်',
                'description' => 'မိမိကိုယ်ကိုယ် တန်ဖိုးမြှင့်တင်ပြီး အောင်မြင်သောဘဝကို တည်ဆောက်နည်း လမ်းညွှန်စာအုပ်။',
                'book_cover' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $selfHelp->id,
                'booktype' => 'premiun',
            ],
            [
                'name' => 'အနာဂတ်အလင်းတန်း',
                'price' => 6000,
                'author' => 'ဖေမြင့်',
                'description' => 'လူငယ်များအတွက် ရည်မှန်းချက်နှင့် ကြိုးစားအားထုတ်မှု စိတ်ဓာတ်မြှင့်တင်ရေး စာအုပ်။',
                'book_cover' => 'https://images.unsplash.com/photo-1476275466078-4007374efbbe?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $selfHelp->id,
                'booktype' => 'free',
            ],
            [
                'name' => 'သမိုင်းထဲက ပုဂံ',
                'price' => 7500,
                'author' => 'ဒေါက်တာသန်းထွန်း',
                'description' => 'ပုဂံခေတ် ယဉ်ကျေးမှုနှင့် သမိုင်းကြောင်းဆိုင်ရာ သုတေသန စာအုပ်ကောင်း။',
                'book_cover' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=600&q=80',
                'file' => '/sample-book.pdf',
                'category_id' => $history->id,
                'booktype' => 'premiun',
            ],
        ];

        foreach ($sampleBooks as $bookData) {
            Book::updateOrCreate(
                ['name' => $bookData['name']],
                $bookData
            );
        }
    }
}
