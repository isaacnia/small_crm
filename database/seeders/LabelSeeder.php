<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::truncate();
        $label = Label::factory(5)->create();
        $this->applyLabelToTickets($label->pluck('id')->toArray());
    }
    private function applyLabelToTickets($label_ids){
        DB::table('tickets_labels')->truncate();
        $tickets_id = Ticket::pluck('id')->toArray();
        foreach ($tickets_id as $ticket_id){
            shuffle($label_ids);
            $labelIdToInsert = array_slice($label_ids,0 ,random_int(1,4));
            foreach ($labelIdToInsert as $label_id){
                DB::table('tickets_labels')->insert([

                    'ticket_id' => $ticket_id,
                    'label_id' => $label_id
                ]);
            }
        }
    }
}
