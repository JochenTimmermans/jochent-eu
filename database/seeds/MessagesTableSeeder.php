<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_name' => ' RobertEssew',
            'user_email' => 'sgwalani@yahoo.com',
            'subject' => 'Your computer, email and smartphone are hacked',
            'message' => 'On June 3, we will post on the Internet and send to all people who you have in contacts and social networks all your photos, correspondence, access to bank accounts and payment systems.        You will be sued and the police will be interested in your person.        A ransom is worth 1 Bitcoin.        Pay 1 BTC until June 3 to our bitcoin wallet: 1LNcUGLunEpDMo4sxNAgAKAGk8eAddTGW'
        ]);
    }
}
