<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();
        DB::table('companies')->insert([
        	[
                "id" => 1,
                "name" => "Turinter L'alianxa",
                "slug" => "turinter-lalianxa",
                "logo" => "",
                "banner" => "",
                "address"   => "C/ Leopoldo Navarro #2, Gazcue, Santo Domingo",
                "phone" => "809-686-4020",
                "site" => "http://turinter.com/",
                "email" => "info@turinter.com",
                "facebook" => "https://www.facebook.com/turinter",
                "twitter" => "https://twitter.com/turinter_sa",
                "instagram" => "https://www.instagram.com/turinter/",
                "youtube" => "https://www.youtube.com/user/turinterLTN",
                "created_at" => "2019-04-27 17:01:36",
                "updated_at" => "2019-06-12 01:00:28",
            ],
            [
                "id" => 2,
                "name" => "Atom Dominicana",
                "slug" => "atom-dominicana",
                "logo" => "",
                "banner" => "",
                "address"   => "C/ Leopoldo Navarro #4, Gazcue, Santo Domingo",
                "phone" => "809-338-4700",
                "site" => "http://atomdominicana.com/",
                "email" => "",
                "facebook" => "http://www.facebook.com/grupo.atom/?fref=ts",
                "twitter" => "http://www.twitter.com/grupoatom",
                "instagram" => "http://www.instagram.com/grupoatom/?hl=en",
                "youtube" => "",
                "created_at" => "2019-04-27 17:02:12",
                "updated_at" => "2019-06-12 01:00:13",
            ]
        ]);
    }
}
