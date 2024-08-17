<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Admin;
use App\Models\Magasin\Agent;
use App\Models\Magasin\Color;
use App\Models\Magasin\Magasin;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $colors = 
        [
            // Region
            'Bisque' => '#FFE4C4',
            'Rose bonbon' => '#F9429E',
            'Chair' => '#FEC3AC',
            'Cherry' => '#EC3B83',
            'Coquille d’œu' => ' #FDE',
            'Alizarine' => '#D90115',
            'Amarante' => '#91283B',
            'Rouge d\'Andrinople',
            'Rouge d\'Anglais' => '#F7230',
            'Abricot' => '#E67E30',
            'Orange brûlé' => '#CC55',
            'Roux' => '#B7410E',
            'Safran' => '#F4C430',
            'Safran' => '#FF7F00'
        ];

        foreach ($colors as $color_key => $color_value) {
            Color::create([
                'name' => $color_key,
                'code' => $color_value
                // 'slug' => str_replace('/','',Hash::make(Str::random(1).$color_key)),
            ]);
        }

        Admin::create([
            'name' => 'Ousmane Diallo',
            'email' => 'admin@admin.com',
            'phone' => '770000000',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'admin@admin.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'status' => 1,
        ]);

        Magasin::create([
            'name' => 'Dell Technologies',
            'admin_name' => 'Ousmane Diallo',
            'email' => 'dell@dell.com',
            'phone' => '770000000',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'dell@dell.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/dell.png",
            'visible' => 0
        ]);

        Magasin::create([
            'name' => 'Intel',
            'admin_name' => 'Boubacar Diallo',
            'email' => 'intel@intel.com',
            'phone' => '770000001',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'intel@intel.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/intel-2.png",
            'visible' => 0
        ]);


        Magasin::create([
            'name' => 'Honda',
            'admin_name' => 'Oumar Diallo',
            'email' => 'honda@honda.com',
            'phone' => '770000002',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'honda@honda.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/honda.png",
            'visible' => 0
        ]);

        Magasin::create([
            'name' => 'Asus ROG',
            'admin_name' => 'Amadou Diallo',
            'email' => 'asus@asus.com',
            'phone' => '770000003',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'asus@asus.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/asus-rog.png",
            'visible' => 0
        ]);

        Magasin::create([
            'name' => 'Yamaha',
            'admin_name' => 'Ramatou Diallo',
            'email' => 'yamaha@yamaha.com',
            'phone' => '770000004',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'yamaha@yamaha.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/yamaha.png",
            'visible' => 0
        ]);

        Magasin::create([
            'name' => 'IBM',
            'admin_name' => 'Fatoumata Diallo',
            'email' => 'ibm@ibm.com',
            'phone' => '770000005',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'ibm@ibm.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
            'logo' => "assets/img/brands/ibm.png",
            'visible' => 0
        ]);

        Agent::create([
            'name' => 'Moussa Ba',
            'email' => 'agent@agent.com',
            'phone' => '770000000',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'agent@agent.com')),
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'magasin_id' => 1,
            'code_validation' => null,
            // 'status' => 1,
        ]);

        User::create([
            'name' => 'Ousmane Diallo',
            'email' => 'client@client.com',
            'phone' => '770000000',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'client@client.com')),
            'image' => "assets/img/team/1.webp",
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
        ]);

        User::create([
            'name' => 'Geodril SN',
            'email' => 'geodril@geodril.com',
            'phone' => '770000001',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'geodril@geodril.com')),
            'image' => "assets/img/team/2.webp",
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
        ]);

        User::create([
            'name' => 'Forage FTE SENEGAL',
            'email' => 'fte@fte.com',
            'phone' => '770000002',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'fte@fte.com')),
            'image' => "assets/img/team/3.webp",
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
        ]);

        User::create([
            'name' => 'IDC SN',
            'email' => 'idc@idc.com',
            'phone' => '770000003',
            'slug' => str_replace('/','',Hash::make(Str::random(2).'idc@idc.com')),
            'image' => "assets/img/team/4.webp",
            'password' => Hash::make('password'),
            'confirmation_token' => null,
            'is_active' => 1,
            'code_validation' => null,
            'termsService' => 1,
        ]);
    }
}
