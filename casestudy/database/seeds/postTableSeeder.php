<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class postTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post= new Post;
        $post->title ='Lorem ipsum dolor sit amet.';
        $post->content = 'Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Internet';
        $post->user_id = 1;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Morbi consectetur vulputate pharetra. ';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Nguyên Ngọc';
        $post->user_id = 1;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Cras viverra tristique pulvinar.';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Xuân Diệu';
        $post->user_id = 2;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Donec eget justo in lorem facilisis.';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Tố Hữu';
        $post->user_id = 1;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Maecenas finibus sapien rutrum metus ultrices';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Xuân Quỳnh';
        $post->user_id = 2;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Donec eget justo in lorem facilisis.';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Lỗ Tấn';
        $post->user_id = 1;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Duis justo arcu';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Lưu Bị';
        $post->user_id = 2;
        $post->image = '';
        $post->save();

        $post= new Post;
        $post->title ='Donec eget aliquet velit.';
        $post->content = ' Pellentesque pretium arcu eu ligula bibendum fermentum. Phasellus ornare consectetur quam in luctus. Integer faucibus nisl quam, i';
        $post->auth = 'Đỗ Phủ';
        $post->user_id = 1;
        $post->image = '';
        $post->save();

    }
}
