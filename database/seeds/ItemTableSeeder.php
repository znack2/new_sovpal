<?php

use Illuminate\Database\Seeder;
use App\Models\Item\Item;

class ItemTableSeeder extends Seeder
{
    public function run()
    {
       factory(Item::class,'item',50)->create();
       factory(Item::class,'tool',50)->create();
       factory(Item::class,'material',50)->create();

       factory(Item::class,'item_premium',20)->create();
       factory(Item::class,'tool_private',20)->create();
       factory(Item::class,'material_private',20)->create();
    }
}
