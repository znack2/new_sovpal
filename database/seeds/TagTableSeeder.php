<?php

use App\models\_partials\Tag;
use App\models\_partials\Image;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
      public function run()
      	{
         
        // brand_type  create by user through create item
        // house_type create through test
        // country_type  create by user through create item
        // tool_type select when create tool
         
         $tags = [
                 ['name'=> 'classic','type'=>'style'],
                 ['name' => 'eclectic','type'=>'style'],
                 ['name' => 'country','type'=>'style'],
                 ['name' => 'kitch','type'=>'style'],
                 ['name' => 'gothic','type'=>'style'],
                 ['name' => 'modern','type'=>'style'],
                 ['name' => 'artdeco','type'=>'style'],
                 ['name' => 'artnuvo','type'=>'style'],
                 ['name' => 'victorian','type'=>'style'],
                 ['name' => 'vintage','type'=>'style'],
                 ['name' => 'minimalizm','type'=>'style'],
                 ['name' => 'industrial','type'=>'style'],
                 ['name' => 'hitech','type'=>'style'],
                 ['name' => 'renessanse','type'=>'style'],
                 ['name' => 'barokko','type'=>'style'],
                 ['name' => 'ampir','type'=>'style'],
                 ['name' => 'rokoko','type'=>'style'],
                 ['name' => 'roman','type'=>'style'],
                 ['name' => 'retro','type'=>'style'],
                 ['name' => 'african','type'=>'style'],
                 ['name' => 'spanish','type'=>'style'],
                 ['name' => 'chinese','type'=>'style'],
                 ['name' => 'franch','type'=>'style'],
                 ['name' => 'japan','type'=>'style'],
                 ['name' => 'arabic','type'=>'style'],
                 ['name' => 'american','type'=>'style'],
                 ['name' => 'marocca','type'=>'style'],
                 ['name' => 'tascan','type'=>'style'],
                 ['name' => 'scandinav','type'=>'style'],
                 ['name' => 'tropical','type'=>'style'],
                 ['name' => 'maveric','type'=>'style'],


                 ['name' => 'kithen','type'=>'room'],
                 ['name' => 'hall','type'=>'room'],
                 ['name' => 'bedroom','type'=>'room'],
                 ['name' => 'bathroom','type'=>'room'],
                 ['name' => 'office','type'=>'room'],
                 ['name' => 'wardrobe','type'=>'room'],
                 ['name' => 'livingroom','type'=>'room'],
                 ['name' => 'balcony','type'=>'room'],
                 ['name' => 'childroom','type'=>'room'],


                 ['name' => 'soft','type'=>'category'],
                 ['name' => 'electrics','type'=>'category'],
                 ['name' => 'decor','type'=>'category'],
                 ['name' => 'furniture','type'=>'category'],
                 ['name' => 'bath','type'=>'category'],
                 ['name' => 'light','type'=>'category'],
                 ['name' => 'wallpaper','type'=>'category'],
                 ['name' => 'other','type'=>'category'],

                 ['name' => 'electrics','type'=>'tool'],
                 ['name' => 'ruled','type'=>'tool'],
                 ['name' => 'handle','type'=>'tool'],
                 ['name' => 'universal','type'=>'tool'],

//work with wood
//work with walls
//work with glass
//work with tiles
//work with paint

                 ['name' => 'demontage','type'=>'work'],
                 ['name' => 'montage','type'=>'work'],
                 ['name' => 'plumbing','type'=>'work'],
                 ['name' => 'electrics','type'=>'work'],
                 ['name' => 'carpentry','type'=>'work'],
                 ['name' => 'forged','type'=>'work'],
                 ['name' => 'tiles','type'=>'work'],
                 ['name' => 'parquet','type'=>'work'],
                 ['name' => 'painting','type'=>'work'],
                 ['name' => 'decor','type'=>'work'],
                 ['name' => 'other','type'=>'work'],

                 ['name' => 'zamer','type'=>'skill'],
                 ['name' => 'plan','type'=>'skill'],
                 ['name' => 'doc','type'=>'skill'],
                 ['name' => 'draw','type'=>'skill'],
                 ['name' => '3d','type'=>'skill'],
                 ['name' => 'shop','type'=>'skill'],
                 ['name' => 'nadzor','type'=>'skill'],
                 ['name' => 'decor','type'=>'skill'],
                 ];


                 foreach($tags as $tag)
                   {
                      $create_tag = new Tag;
                      $create_tag->name = $tag['name'];
                      $create_tag->type = $tag['type'];
                      $create_tag->save();

                    $image          = new Image;
                    $image->url     = $tag['name'];
                    $image->file    = 'png';
                    $image->alt     = 'tag_icon';
                    $image->type    = 'tag';
                    $image->save();
                    $create_tag->images()->attach($image);
                   }

      	}
}
