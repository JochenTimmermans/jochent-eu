<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => 'The Oracle',
            'desc' => '<p>An oracle site I made for a friend, where people ask a question and my friend posts his answer through an Admin Panel.</p><p>I used mainly PHP for the functionality, with the questions and answers going to a MySQL database. The question-form was made using JavaScript to give it a more modern feel. I thought up the design, sketched it in GIMP and arranged it with SASS.</p>',
            'imgurl' => 'oracle.png',
            'projecturl' => 'http://theoracleanswers.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('projects')->insert([
            'title' => 'Hangman',
            'desc' => '<p>A simple Hangman game I made on a rainy day. All was done in PHP using MySQL for holding a wordlist, as well as the unique user URLs so they could re-visit an already started game.</p>',
            'imgurl' => 'hangman.png',
            'projecturl' => 'https://hangman.islandshore.net',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
