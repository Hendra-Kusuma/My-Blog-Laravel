<?php

namespace Database\Seeders;

use App\Models\articlesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        articlesModel::Create([
            'title' => 'Migration Database in Laravel',
            'content' => 'Don’t forget that I hope you have also understood the use of the database application and have already connected the database to your VSCode configuration beforehand. Here, I am using the TablePlus application, and for the local database server, I am using Laragon. The .env file can be adjusted to match your database settings when installing MySQL. The seeder file can be configured accordingly, for example, I added only 3 data to the books_legend table. After that, we can register the seeder file in the DatabaseSeeder.php file so that when the seeder is processed, the data can be inserted. So when executed with the',
            'author' => 'Hendra Kusuma'
        ]);

        articlesModel::Create([
            'title' => 'Become Mastering in Laravel',
            'content' => 'Backgrounds
            In this case, currently, Im on learning the PHP backend framework Laravel on my Bootcamp,
            default migration file Laravel
            However we can also create a migration file according to the database structure defined in the model file we want to create. First, we can create a migration using a command like this: `php artisan make:migration create_books_legend_table`. After running this command, the migration file will be automatically generated in the migrations folder',
            'author' => 'Hendra Kusuma'
        ]);

        articlesModel::Create([
            'title' => 'Hello World',
            'content' => 'Hello Everybody, yes this is my first time i make a blog. iam so very happy and i want you to know more about me. iam realy want to be come a software engineer. i dont have a IT background but i have a passion in software so i learn more and practice everyday to become software engineer',
            'author' => 'Hendra Kusuma'
        ]);
    }
}
