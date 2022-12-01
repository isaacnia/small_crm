<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        $users = User::pluck('id')->toArray();
        foreach ($users as $user){
            Ticket::factory(random_int(0,3))->create([
                'assigned' => $user,
            ]);
        }
    }
}
