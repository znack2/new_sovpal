<?php

use App\models\_partials\Element;
use App\models\_partials\Image;
use App\models\_partials\Tag;
use Illuminate\Database\Seeder;

class ElementTableSeeder extends Seeder
{
    public function run()
    {
        $elements =[
// items
            ['name' => 'kithen',                'room'=>['kithen'],                                                         'category'=>'furniture',   'type'=>'item'],
            ['name' => 'surface',               'room'=>['kithen'],                                                         'category'=>'other',       'type'=>'item'],
            ['name' => 'table',                 'room'=>['kithen','childroom','livingroom','hall','bedroom','office'],      'category'=>'furniture',   'type'=>'item'],
            ['name' => 'chair',                 'room'=>['kithen','childroom','hall','bedroom','balcony','office'],         'category'=>'furniture',   'type'=>'item'],
            ['name' => 'office_table',          'room'=>['office','childroom'],       'category'=>'furniture',   'type'=>'item'],
            ['name' => 'office_chair',          'room'=>['office','childroom'],       'category'=>'furniture',   'type'=>'item'],
            ['name' => 'sink',                  'room'=>['bathroom','kithen'],        'category'=>'bath',   'type'=>'item'],
            ['name' => 'vanna',                 'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'unitaz',                'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'bide',                  'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'faucet',                'room'=>['bathroom','kithen'],        'category'=>'bath',   'type'=>'item'],
            ['name' => 'shower',                'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'handshower',            'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'showerstall',           'room'=>['bathroom'],                 'category'=>'bath',   'type'=>'item'],
            ['name' => 'trap',                  'room'=>['bathroom'],                 'category'=>'bath',         'type'=>'item'],
            ['name' => 'showerbase',            'room'=>['bathroom'],                 'category'=>'bath',         'type'=>'item'],
        
            ['name' => 'dryer',                 'room'=>['bathroom'],                 'category'=>'other',  'type'=>'item'],
            ['name' => 'mirror',                'room'=>['bathroom','hall','bedroom','wardrobe'],    'category'=>'decor',  'type'=>'item'],
            ['name' => 'sofa',                  'room'=>['livingroom','childroom','balcony','bedroom'],    'category'=>'soft',       'type'=>'item'],
            ['name' => 'armchair',              'room'=>['livingroom','childroom','bedroom'],              'category'=>'soft',       'type'=>'item'],
            ['name' => 'puff',                  'room'=>['livingroom','childroom','wardrobe','bedroom'],   'category'=>'soft',       'type'=>'item'],
            ['name' => 'ottomans',              'room'=>['livingroom','childroom','wardrobe','bedroom'],   'category'=>'soft',       'type'=>'item'],
            ['name' => 'bed',                   'room'=>['bedroom','childroom'],                        'category'=>'furniture',  'type'=>'item'],
            ['name' => 'matras',                'room'=>['bedroom','childroom'],                        'category'=>'other',    'type'=>'item'],
            ['name' => 'nightstand',            'room'=>['bedroom','childroom'],                        'category'=>'furniture',   'type'=>'item'],
            ['name' => 'camode',                'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'furniture',   'type'=>'item'],
            ['name' => 'bookcase',              'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'furniture',  'type'=>'item'],
            ['name' => 'console',               'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'furniture',       'type'=>'item'],
            ['name' => 'chandelier',            'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'light',   'type'=>'item'],
            ['name' => 'bra',                   'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'light',   'type'=>'item'],
            ['name' => 'torsher',               'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'light',   'type'=>'item'],
            ['name' => 'spot',                  'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'light',   'type'=>'item'],
            ['name' => 'lamp',                  'room'=>['bedroom','childroom','wardrobe','hall'],      'category'=>'light',   'type'=>'item'],

            ['name' => 'door',                  'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'other',      'type'=>'item'],
            ['name' => 'window',                'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'other',      'type'=>'item'],
            ['name' => 'curtain',               'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'wallpaper',  'type'=>'item'],
            ['name' => 'heater',                'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'electrics',  'type'=>'item'],
            ['name' => 'fireplace',             'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'other',      'type'=>'item'],
            ['name' => 'rug',                   'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'wallpaper',  'type'=>'item'],
            ['name' => 'textile',               'room'=>['kithen','livingroom','balcony','office','childroom','wardrobe','hall','bathroom','bedroom'],      'category'=>'wallpaper',  'type'=>'item'],


            ['name' => 'default',               'type'=>'item'],
            ['name' => 'default',               'type'=>'material'],
            ['name' => 'default',               'type'=>'tool'],

//   tool

            // 'electrics' => 'Аккумуляторный', 
            // 'ruled'     => 'измерительные',  
            // 'handle'    => 'ручные', 
            // 'universal' => 'универсальные', 


                  ['name'=>'hammer',         'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'mallet',         'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'jackhammer',     'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'sledgehammer',   'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'corner',         'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'pliers',         'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'wirecutters',    'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'chisel',         'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'chisel2',        'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'jack-plane',     'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'hacksaw',        'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'nail-drawer',    'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'pinch-bar',      'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'shovel',         'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'scissors',       'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'plummet',        'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'tester',         'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'generator',      'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'welder',         'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'compressor',     'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'bitbrace',       'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'tongs',          'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'wrench',         'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'engraver',       'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'wall-chaser',    'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'copingsaw',      'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'screwdriver',    'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'tape-measure',   'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'level',          'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'stapler',        'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'riveter',        'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'sprinkler',      'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'handsaw',        'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'tile',           'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'bit',            'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'calipers',       'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'ohmmeter',       'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'tap',            'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'file',           'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'hoist',          'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'powersaw',       'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'autoscrewdriver','tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'bender',         'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'cutter',         'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'perforator',     'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'sander',         'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'fen',            'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'disk',           'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'spiritlevel',    'tool'=>'ruled',     'type'=>'tool'],
                  ['name'=>'vice',           'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'glass-cutter',   'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'drill',          'tool'=>'electrics',     'type'=>'tool'],
                  ['name'=>'spanner',        'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'ladder',         'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'scraper',        'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'roller',         'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'paintbrush',     'tool'=>'handle',     'type'=>'tool'],
                  ['name'=>'tape',           'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'mixer',          'tool'=>'universal',     'type'=>'tool'],
                  ['name'=>'helmet',         'tool'=>'universal',     'type'=>'tool'],

//   material


            // ['name' => 'liquor',                'work'=>'painting',         'type'=>'material'],
            // ['name' => 'heater',                'work'=>'plumbing',         'type'=>'material'],
            // ['name' => 'handle',                'work'=>'forged',           'type'=>'material'],
            // ['name' => 'climate-system',        'work'=>'electrics',        'type'=>'material'],
            // ['name' => 'control-system',        'work'=>'electrics',        'type'=>'material'],
            // ['name' => 'shield',                'work'=>'electrics',        'type'=>'material'],
            // ['name' => 'boiler',                'work'=>'plumbing',         'type'=>'material'],
            // ['name' => 'bath',                  'work'=>'plumbing',         'type'=>'material'],
            // ['name' => 'ceiling',               'work'=>'montage',          'type'=>'material'],
            // ['name' => 'composite',             'work'=>'montage',          'type'=>'material'],
            // ['name' => 'insulation',            'work'=>'montage',          'type'=>'material'],
            // ['name' => 'metal',                 'work'=>'montage',          'type'=>'material'],
            // ['name' => 'lumber',                'work'=>'carpentry',        'type'=>'material'],
            // ['name' => 'panels',                'work'=>'carpentry',        'type'=>'material'],
            // ['name' => 'implement',             'work'=>'forged',           'type'=>'material'],
            // ['name' => 'fastener',              'work'=>'forged',           'type'=>'material'],


            ['name'=>'paint',                   'work'=>'painting',         'type'=>'material'],
            ['name'=>'silicone',                'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'enamel',                  'work'=>'painting',         'type'=>'material'],
            ['name'=>'varnish',                 'work'=>'painting',         'type'=>'material'],
            ['name'=>'composite-reinforcement', 'work'=>'montage',          'type'=>'material'],
            ['name'=>'undercoat',               'work'=>'painting',         'type'=>'material'],
            ['name'=>'filler',                  'work'=>'painting',         'type'=>'material'],
            ['name'=>'paint-thinner',           'work'=>'painting',         'type'=>'material'],
            ['name'=>'pigment',                 'work'=>'painting',         'type'=>'material'],
            ['name'=>'linseed-oil',             'work'=>'painting',         'type'=>'material'],
            ['name'=>'putty',                   'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'carpeting',               'work'=>'decor',            'type'=>'material'],
            ['name'=>'plaster-board',           'work'=>'montage',          'type'=>'material'],
            ['name'=>'adhesive-tape',           'work'=>'decor',            'type'=>'material'],
            ['name'=>'suspended-ceiling',       'work'=>'montage',          'type'=>'material'],
            ['name'=>'solder',                  'work'=>'montage',          'type'=>'material'],
            ['name'=>'ceramic-decorative-panel','work'=>'montage',          'type'=>'material'],
            ['name'=>'decorative-plaster',      'work'=>'decor',            'type'=>'material'],
            ['name'=>'fiberglass',              'work'=>'montage',          'type'=>'material'],
            ['name'=>'gumboil',                 'work'=>'montage',          'type'=>'material'],
            ['name'=>'OSB-panel',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'MDF-panel',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'flexible-stone',          'work'=>'montage',          'type'=>'material'],
            ['name'=>'plexiglas',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'arch-concrete',           'work'=>'decor',            'type'=>'material'],
            ['name'=>'polymer-tube',            'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'textile-wallpaper',       'work'=>'decor',            'type'=>'material'],
            ['name'=>'liquid-wallpaper',        'work'=>'decor',            'type'=>'material'],
            ['name'=>'non-woven-wallpaper',     'work'=>'decor',            'type'=>'material'],
            ['name'=>'washable-wallpaper',      'work'=>'decor',            'type'=>'material'],
            ['name'=>'hardboard',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'ruberoid',                'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'dry-mix',                 'work'=>'montage',          'type'=>'material'],
            ['name'=>'grout',                   'work'=>'tiles',            'type'=>'material'],
            ['name'=>'laminate',                'work'=>'parquet',          'type'=>'material'],
            ['name'=>'shutters',                'work'=>'decor',            'type'=>'material'],
            ['name'=>'color-portland',          'work'=>'montage',          'type'=>'material'],
            ['name'=>'glass-tile',              'work'=>'tiles',            'type'=>'material'],
            ['name'=>'foamglass',               'work'=>'other',            'type'=>'material'],
            ['name'=>'polyurethane-foam',       'work'=>'montage',          'type'=>'material'],
            ['name'=>'dowel',                   'work'=>'other',            'type'=>'material'],
            ['name'=>'nail',                    'work'=>'other',            'type'=>'material'],
            ['name'=>'screw',                   'work'=>'other',            'type'=>'material'],
            ['name'=>'bracket',                 'work'=>'other',            'type'=>'material'],
            ['name'=>'protective-glasses',      'work'=>'other',            'type'=>'material'],
            ['name'=>'cable',                   'work'=>'other',            'type'=>'material'],
            ['name'=>'wallpanel',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'cementparticle-board',    'work'=>'montage',          'type'=>'material'],
            ['name'=>'chippings',               'work'=>'montage',          'type'=>'material'],
            ['name'=>'artificial-marble',       'work'=>'tiles',            'type'=>'material'],
            ['name'=>'magnesiumoxide-wallboard','work'=>'montage',          'type'=>'material'],
            ['name'=>'mineral-wool',            'work'=>'montage',          'type'=>'material'],
            ['name'=>'parquet',                 'work'=>'parquet',          'type'=>'material'],
            ['name'=>'polycarbonate',           'work'=>'montage',          'type'=>'material'],
            ['name'=>'arbolit',                 'work'=>'montage',          'type'=>'material'],
            ['name'=>'polymer-concrete',        'work'=>'montage',          'type'=>'material'],
            ['name'=>'design-tiles',            'work'=>'tiles',            'type'=>'material'],
            ['name'=>'Penoplex-panel',          'work'=>'montage',          'type'=>'material'],
            ['name'=>'ceramic-stone',           'work'=>'montage',          'type'=>'material'],
            ['name'=>'photo-tiles',             'work'=>'tiles',            'type'=>'material'],
            ['name'=>'facing-stone',            'work'=>'montage',          'type'=>'material'],
            ['name'=>'artificial-stone',        'work'=>'montage',          'type'=>'material'],
            ['name'=>'sandwich-panel',          'work'=>'montage',          'type'=>'material'],
            ['name'=>'mortar',                  'work'=>'montage',          'type'=>'material'],
            ['name'=>'plaster',                 'work'=>'montage',          'type'=>'material'],
            ['name'=>'copper-pipe',             'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'ceramica',                'work'=>'decor',            'type'=>'material'],
            ['name'=>'ceramic-border',          'work'=>'decor',            'type'=>'material'],
            ['name'=>'corian',                  'work'=>'decor',            'type'=>'material'],
            ['name'=>'liquid-glass',            'work'=>'decor',            'type'=>'material'],
            ['name'=>'fiberboard',              'work'=>'montage',          'type'=>'material'],
            ['name'=>'glue',                    'work'=>'painting',         'type'=>'material'],
            ['name'=>'mosaic',                  'work'=>'tiles',            'type'=>'material'],
            ['name'=>'linolium',                'work'=>'parquet',          'type'=>'material'],
            ['name'=>'tiles',                   'work'=>'tiles',            'type'=>'material'],
            ['name'=>'plinth',                  'work'=>'decor',            'type'=>'material'],
            ['name'=>'plinth2',                 'work'=>'parquet',          'type'=>'material'],
            ['name'=>'in_paint',                'work'=>'painting',         'type'=>'material'],
            ['name'=>'out_paint',               'work'=>'painting',         'type'=>'material'],
            ['name'=>'pipe',                    'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'pipes',                   'work'=>'plumbing',         'type'=>'material'],
            ['name'=>'stone',                   'work'=>'tiles',            'type'=>'material'],
            ['name'=>'switch',                  'work'=>'electrics',        'type'=>'material'],
            ['name'=>'cable',                   'work'=>'electrics',        'type'=>'material'],
            ['name'=>'socket',                  'work'=>'electrics',        'type'=>'material'],
            ['name'=>'sandpaper',               'work'=>'montage',          'type'=>'material'],

            ['name' => 'other',             'work'=>'decor',            'type'=>'material'],
            ['name' => 'other',             'work'=>'tiles',            'type'=>'material'],
            ['name' => 'other',             'work'=>'parquet',          'type'=>'material'],
            ['name' => 'other',             'work'=>'carpentry',        'type'=>'material'],
            ['name' => 'other',             'work'=>'forged',           'type'=>'material'],
            ['name' => 'other',             'work'=>'painting',         'type'=>'material'],
            ['name' => 'other',             'work'=>'electrics',        'type'=>'material'],
            ['name' => 'other',             'work'=>'plumbing',         'type'=>'material'],
            ['name' => 'other',             'work'=>'montage',          'type'=>'material'],

                    ];

                    foreach($elements as $element)
                      {
                               $create_element = new Element;
                               $create_element->name = $element['name'];
                               $create_element->type = $element['type'];
                               $create_element->save();

                             $image          = new Image;
                             $image->url     = $element['name'];
                             $image->file    = 'png';
                             $image->alt     = 'element_icon';
                             $image->type    = 'element';
                             $image->save();
                             $create_element->images()->attach($image);


                          if(array_key_exists('room', $element))
                                {
                                    foreach($element['room'] as $room)
                                    {
                                        $room_tag = Tag::where('name',$room)->first();
                                        $create_element->tags()->attach($room_tag); 
                                    }
                                }

                          if(array_key_exists('category', $element))
                                {
                                     $category_tag = Tag::where('name',$element['category'])->first();
                                     $create_element->tags()->attach($category_tag); 
                                }     
                                  
                          if(array_key_exists('work', $element))
                                {
                                     $work_tag = Tag::where('name',$element['work'])->first();
                                     $create_element->tags()->attach($work_tag); 
                                }
                      }
    }
}
