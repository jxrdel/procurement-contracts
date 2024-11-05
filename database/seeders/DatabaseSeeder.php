<?php

namespace Database\Seeders;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                'fname' => 'Jardel',
                'lname' => 'Regis',
                'username' => 'jardel.regis',
                'email' => 'jardel.regis@health.gov.tt',
            ],
            [
                'fname' => 'Varma',
                'lname' => 'Maharaj',
                'username' => 'varma.maharaj',
                'email' => 'varma.maharaj@health.gov.tt',
            ],
            [
                'fname' => 'Stephen',
                'lname' => 'Clarke',
                'username' => 'stephen.clarke',
                'email' => 'stephen.clarke@health.gov.tt',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $companies = [
            [
                'name' => 'TSTT',
                'is_active' => true,
                'details' => 'Details 1',
                'address1' => 'Address 1',
                'address2' => 'Address 2',
                'phone1' => '531-5125',
                'phone2' => '545-6625',
                'email' => 'mail@mail.com',
            ],
            [
                'name' => 'Digicel',
                'is_active' => true,
                'details' => 'Details 2',
                'address1' => 'Address 1',
                'address2' => 'Address 2',
                'phone1' => '531-5125',
                'phone2' => '545-6625',
                'email' => 'mail@mail.com',
            ],
            [
                'name' => 'Flow',
                'is_active' => true,
                'details' => 'Details 3',
                'address1' => 'Address 1',
                'address2' => 'Address 2',
                'phone1' => '531-5125',
                'phone2' => '545-6625',
                'email' => 'mail@mail.com',
            ],
        ];

        foreach ($companies as $company) {
            ExternalCompany::create($company);
        }

        $externalcontacts = [
            [
                'external_company_id' => 1,
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'mail@mail.com',
                'phone1' => '531-5125',
                'phone2' => '545-6625',
                'note' => 'Note 1',
                'is_active' => true,
            ],
            [
                'external_company_id' => 1,
                'fname' => 'Jane',
                'lname' => 'Doe',
                'email' => 'doe@mail.com',
                'phone1' => '531-5125',
                'phone2' => '545-6625',
                'note' => 'Note 2',
                'is_active' => true,
            ],
        ];

        foreach ($externalcontacts as $externalcontact) {
            ExternalContact::create($externalcontact);
        }
    }
}
