<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   Category::truncate();
        $category = Category::factory(5)->create();
        $this->applyLabelToTickets($category->pluck('id')->toArray());
    }

    private function applyLabelToTickets($category_ids){
        DB::table('tickets_categories')->truncate();
        $tickets_id = Ticket::pluck('id')->toArray();
        foreach ($tickets_id as $ticket_id){
            shuffle($category_ids);
            $categoryIdToInsert = array_slice($category_ids,0 ,random_int(1,4));
            foreach ($categoryIdToInsert as $category_id){
                DB::table('tickets_categories')->insert([
                    'ticket_id' => $ticket_id,
                    'category_id' => $category_id
                ]);
            }
        }
    }
}
