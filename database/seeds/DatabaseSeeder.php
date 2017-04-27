<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(FactorySeeder::class);

        Model::reguard();
    }
}

class UserSeeder extends Seeder {

    public function run()
    {
        \App\User::create([
            'name' => 'yarwest',
            'email' => 'yarnoboelens@gmail.com',
            'password' => Hash::make('tmp123')

        ]);

        \App\User::create([
            'name' => 'callofphone',
            'email' => 'callofphone@gmail.com',
            'password' => Hash::make('tmp123')

        ]);

    }
}

class FactorySeeder extends Seeder {

    public function run()
    {
        factory(App\CitationStyle::class, 5)
            ->create()
            ->each(function ($r) {
                $r->resourceType()->saveMany(factory(App\ResourceType::class, 2)->make());
            });

        factory(App\ResourceComponent::class, 20)->create();
    }
}
