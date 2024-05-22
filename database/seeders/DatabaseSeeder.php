<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to allow mass insertion
        Schema::disableForeignKeyConstraints();

        // Clear tables
        DB::table('administrators')->truncate();
        DB::table('moderators')->truncate();
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('themes')->truncate();
        DB::table('news')->truncate();
        DB::table('polls')->truncate();
        DB::table('user_passwords')->truncate();

        // Insert users
        $users = [
            ['username' => 'admin1', 'name' => 'Admin', 'surname' => 'One', 'gender' => 'M', 'birthplace' => 'CityA', 'date_of_birth' => '1980-01-01', 'jmbg' => '1234567890123', 'phone_num' => '1234567890', 'email' => 'admin1@example.com', 'password' => Hash::make('admin1'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'moderator1', 'name' => 'Moderator', 'surname' => 'One', 'gender' => 'F', 'birthplace' => 'CityB', 'date_of_birth' => '1982-02-02', 'jmbg' => '1234567890124', 'phone_num' => '1234567891', 'email' => 'moderator1@example.com', 'password' => Hash::make('moderator1'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'johnsmith', 'name' => 'John', 'surname' => 'Smith', 'gender' => 'M', 'birthplace' => 'CityC', 'date_of_birth' => '1990-03-03', 'jmbg' => '1234567890125', 'phone_num' => '1234567892', 'email' => 'johnsmith@example.com', 'password' => Hash::make('johnsmith'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'janesmith', 'name' => 'Jane', 'surname' => 'Smith', 'gender' => 'F', 'birthplace' => 'CityD', 'date_of_birth' => '1992-04-04', 'jmbg' => '1234567890126', 'phone_num' => '1234567893', 'email' => 'janesmith@example.com', 'password' => Hash::make('janesmith'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'alexpop', 'name' => 'Alex', 'surname' => 'Pop', 'gender' => 'M', 'birthplace' => 'CityE', 'date_of_birth' => '1985-05-05', 'jmbg' => '1234567890127', 'phone_num' => '1234567894', 'email' => 'alexpop@example.com', 'password' => Hash::make('alexpop'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'marydoe', 'name' => 'Mary', 'surname' => 'Doe', 'gender' => 'F', 'birthplace' => 'CityF', 'date_of_birth' => '1987-06-06', 'jmbg' => '1234567890128', 'phone_num' => '1234567895', 'email' => 'marydoe@example.com', 'password' => Hash::make('marydoe'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'jackjohnson', 'name' => 'Jack', 'surname' => 'Johnson', 'gender' => 'M', 'birthplace' => 'CityG', 'date_of_birth' => '1991-07-07', 'jmbg' => '1234567890129', 'phone_num' => '1234567896', 'email' => 'jackjohnson@example.com', 'password' => Hash::make('jackjohnson'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'sarajones', 'name' => 'Sara', 'surname' => 'Jones', 'gender' => 'F', 'birthplace' => 'CityH', 'date_of_birth' => '1993-08-08', 'jmbg' => '1234567890130', 'phone_num' => '1234567897', 'email' => 'sarajones@example.com', 'password' => Hash::make('sarajones'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'bobbrown', 'name' => 'Bob', 'surname' => 'Brown', 'gender' => 'M', 'birthplace' => 'CityI', 'date_of_birth' => '1989-09-09', 'jmbg' => '1234567890131', 'phone_num' => '1234567898', 'email' => 'bobbrown@example.com', 'password' => Hash::make('bobbrown'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'lindablack', 'name' => 'Linda', 'surname' => 'Black', 'gender' => 'F', 'birthplace' => 'CityJ', 'date_of_birth' => '1995-10-10', 'jmbg' => '1234567890132', 'phone_num' => '1234567899', 'email' => 'lindablack@example.com', 'password' => Hash::make('lindablack'), 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('users')->insert($users);

        // Fetch the user IDs for admin1 and moderator1
        $admin1_id = DB::table('users')->where('username', 'admin1')->value('userId');
        $moderator1_id = DB::table('users')->where('username', 'moderator1')->value('userId');

        // Insert into administrators and moderators tables
        DB::table('administrators')->insert(['user_id' => $admin1_id, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('moderators')->insert(['user_id' => $moderator1_id, 'created_at' => now(), 'updated_at' => now()]);

        // Insert themes
        $themes = [
            ['name' => 'Fantasy', 'description' => 'Discussion about Fantasy genre', 'followers' => 100, 'posts' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Science Fiction', 'description' => 'Discussion about Science Fiction genre', 'followers' => 80, 'posts' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mystery', 'description' => 'Discussion about Mystery genre', 'followers' => 60, 'posts' => 30, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('themes')->insert($themes);

        // Fetch theme IDs
        $fantasy_theme_id = DB::table('themes')->where('name', 'Fantasy')->value('themeId');
        $sci_fi_theme_id = DB::table('themes')->where('name', 'Science Fiction')->value('themeId');
        $mystery_theme_id = DB::table('themes')->where('name', 'Mystery')->value('themeId');

        // Insert posts
        $posts = [
            ['title' => 'Exploring Fantasy Worlds', 'author' => 'admin1', 'content' => 'A discussion about creating detailed fantasy worlds.', 'created_at' => now(), 'updated_at' => now(), 'theme_id' => $fantasy_theme_id, 'user_id' => $admin1_id],
            ['title' => 'The Future of Sci-Fi', 'author' => 'moderator1', 'content' => 'Where is science fiction headed in the next decade?', 'created_at' => now(), 'updated_at' => now(), 'theme_id' => $sci_fi_theme_id, 'user_id' => $moderator1_id],
            ['title' => 'Mystery Writing Tips', 'author' => 'admin1', 'content' => 'How to create suspense and intrigue in your mystery novels.', 'created_at' => now(), 'updated_at' => now(), 'theme_id' => $mystery_theme_id, 'user_id' => $admin1_id],
        ];

        DB::table('posts')->insert($posts);

        // Insert news
        $news = [
            ['author' => 'admin1', 'title' => 'Fantasy Genre Trends', 'content' => 'New trends emerging in the fantasy genre.', 'theme_id' => $fantasy_theme_id, 'created_at' => now(), 'updated_at' => now()],
            ['author' => 'moderator1', 'title' => 'Sci-Fi Award Winners', 'content' => 'Recent award winners in the science fiction genre.', 'theme_id' => $sci_fi_theme_id, 'created_at' => now(), 'updated_at' => now()],
            ['author' => 'admin1', 'title' => 'Mystery Writers Conference', 'content' => 'Upcoming conference for mystery writers.', 'theme_id' => $mystery_theme_id, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('news')->insert($news);

        // Insert polls
        $polls = [
            ['author' => 'admin1', 'title' => 'Best Fantasy Series', 'optionOne' => 'The Lord of the Rings', 'optionTwo' => 'Harry Potter', 'optionThree' => 'A Song of Ice and Fire', 'optionFour' => null, 'optionFive' => null, 'numOne' => 0, 'numTwo' => 0, 'numThree' => 0, 'numFour' => null, 'numFive' => null, 'theme_id' => $fantasy_theme_id, 'created_at' => now(), 'updated_at' => now()],
            ['author' => 'moderator1', 'title' => 'Favorite Sci-Fi Author', 'optionOne' => 'Isaac Asimov', 'optionTwo' => 'Philip K. Dick', 'optionThree' => 'Arthur C. Clarke', 'optionFour' => 'Ursula K. Le Guin', 'optionFive' => null, 'numOne' => 0, 'numTwo' => 0, 'numThree' => 0, 'numFour' => 0, 'numFive' => null, 'theme_id' => $sci_fi_theme_id, 'created_at' => now(), 'updated_at' => now()],
            ['author' => 'admin1', 'title' => 'Top Mystery Novel', 'optionOne' => 'The Hound of the Baskervilles', 'optionTwo' => 'Gone Girl', 'optionThree' => 'The Da Vinci Code', 'optionFour' => null, 'optionFive' => null, 'numOne' => 0, 'numTwo' => 0, 'numThree' => 0, 'numFour' => null, 'numFive' => null, 'theme_id' => $mystery_theme_id, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('polls')->insert($polls);

        // Insert passwords into user_passwords table
        $userPasswords = DB::table('users')->select('userId', 'password', 'created_at', 'updated_at')->get()->map(function ($user) {
            return [
                'user_id' => $user->userId,
                'first_pass' => $user->password,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ];
        })->toArray();

        DB::table('user_passwords')->insert($userPasswords);

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}