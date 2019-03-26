<?php

use Illuminate\Database\Seeder;
use App\Tag;

class tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag =new Tag;
        $tag->kind ='Pellentesque';
        $tag ->descryption = 'Suspendisse in ipsum eu elit commodo pellentesque. Proin dapibus sapien et lacus fermentum imperdiet.';
        $tag->save();

        $tag =new Tag;
        $tag->kind ='Sollicitudin ';
        $tag ->descryption = 'Vestibulum aliquet mi sollicitudin, aliquam odio vitae, tempor orci.';
        $tag->save();

        $tag =new Tag;
        $tag->kind ='Aliquam ';
        $tag ->descryption = 'Vestibulum aliquet mi sollicitudin, aliquam odio vitae, tempor orci.';
        $tag->save();

        $tag =new Tag;
        $tag->kind ='Tempor ';
        $tag ->descryption = 'Vestibulum aliquet mi sollicitudin, aliquam odio vitae, tempor orci.';
        $tag->save();
    }
}
