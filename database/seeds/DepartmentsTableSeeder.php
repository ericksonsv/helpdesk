<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->truncate();
        DB::table('departments')->insert([
        	[
                "id" => 1,
                "company_id" => 1,
                "name" => "Administracción",
                "slug" => "administraccion",
                "created_at" => "2019-04-27 17:18:15",
                "updated_at" => "2019-04-27 17:18:15",
            ],
            [
                "id" => 2,
                "company_id" => 1,
                "name" => "Computos",
                "slug" => "computos",
                "created_at" => "2019-04-27 17:18:44",
                "updated_at" => "2019-04-27 17:57:56",
            ],
            [
                "id" => 3,
                "company_id" => 1,
                "name" => "Contabilidad",
                "slug" => "contabilidad",
                "created_at" => "2019-04-27 17:18:58",
                "updated_at" => "2019-04-27 17:18:58",
            ],
            [
                "id" => 4,
                "company_id" => 1,
                "name" => "Publicidad Mercadeo",
                "slug" => "publicidad-mercadeo",
                "created_at" => "2019-04-27 17:19:22",
                "updated_at" => "2019-04-27 17:19:22",
            ],
            [
                "id" => 5,
                "company_id" => 1,
                "name" => "Recursos Humanos",
                "slug" => "recursos-humanos",
                "created_at" => "2019-04-27 17:19:40",
                "updated_at" => "2019-04-27 17:19:40",
            ],
            [
                "id" => 6,
                "company_id" => 1,
                "name" => "Hoteles",
                "slug" => "hoteles",
                "created_at" => "2019-04-27 17:19:49",
                "updated_at" => "2019-04-27 17:19:49",
            ],
            [
                "id" => 7,
                "company_id" => 1,
                "name" => "Boletos Aéreos",
                "slug" => "boletos-aereos",
                "created_at" => "2019-04-27 17:20:01",
                "updated_at" => "2019-06-14 16:42:19",
            ],
            [
                "id" => 8,
                "company_id" => 1,
                "name" => "Ventas",
                "slug" => "ventas",
                "created_at" => "2019-04-27 17:20:21",
                "updated_at" => "2019-04-27 17:20:21",
            ],
            [
                "id" => 9,
                "company_id" => 1,
                "name" => "Emisivo",
                "slug" => "emisivo",
                "created_at" => "2019-04-27 17:20:30",
                "updated_at" => "2019-04-27 17:20:30",
            ],
            [
                "id" => 10,
                "company_id" => 1,
                "name" => "Grupos y Eventos",
                "slug" => "grupos-y-eventos",
                "created_at" => "2019-04-27 17:20:59",
                "updated_at" => "2019-04-27 17:20:59",
            ],
            [
                "id" => 11,
                "company_id" => 2,
                "name" => "Administracción",
                "slug" => "administraccion-1",
                "created_at" => "2019-04-27 17:22:42",
                "updated_at" => "2019-04-27 17:22:42",
            ],
            [
                "id" => 12,
                "company_id" => 2,
                "name" => "Contabilidad",
                "slug" => "contabilidad-1",
                "created_at" => "2019-04-27 17:22:55",
                "updated_at" => "2019-04-27 17:22:55",
            ],
            [
                "id" => 13,
                "company_id" => 2,
                "name" => "Ventas",
                "slug" => "ventas-1",
                "created_at" => "2019-04-27 17:23:11",
                "updated_at" => "2019-04-27 17:23:11",
            ],
            [
                "id" => 14,
                "company_id" => 2,
                "name" => "Internacional",
                "slug" => "internacional",
                "created_at" => "2019-04-27 17:23:21",
                "updated_at" => "2019-04-27 17:23:21",
            ]
        ]);
    }
}
