<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $posts = [
            ['2017-11-10 15:45:57', 'Title 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim tortor at auctor urna nunc id cursus. Enim nunc faucibus a pellentesque sit. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Eget arcu dictum varius duis at consectetur. Enim blandit volutpat maecenas volutpat blandit. Lorem mollis aliquam ut porttitor leo a diam. In nisl nisi scelerisque eu ultrices vitae auctor eu. Fermentum et sollicitudin ac orci. Est ante in nibh mauris cursus mattis molestie a iaculis. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Varius vel pharetra vel turpis. Non nisi est sit amet facilisis magna. Egestas dui id ornare arcu odio ut. Nulla at volutpat diam ut venenatis tellus in metus. Ornare arcu dui vivamus arcu felis bibendum ut. Dictum varius duis at consectetur lorem. At risus viverra adipiscing at in. At risus viverra adipiscing at in tellus integer. Cras sed felis eget velit aliquet sagittis id.

Ac auctor augue mauris augue neque gravida in. Nulla at volutpat diam ut. Congue nisi vitae suscipit tellus mauris a diam. Odio aenean sed adipiscing diam donec adipiscing. Nisl purus in mollis nunc sed id. Aliquet sagittis id consectetur purus ut. Lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis. Cursus risus at ultrices mi tempus. Leo in vitae turpis massa. Lectus arcu bibendum at varius vel pharetra vel turpis. Quam id leo in vitae turpis massa sed elementum. Ipsum faucibus vitae aliquet nec ullamcorper. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Vel facilisis volutpat est velit egestas. Amet nisl suscipit adipiscing bibendum. Augue lacus viverra vitae congue eu consequat ac felis donec. Egestas sed sed risus pretium quam.'],
            ['2017-11-10 17:45:57', 'Title 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis viverra nibh cras pulvinar mattis nunc sed blandit libero. Euismod nisi porta lorem mollis aliquam ut porttitor. Phasellus vestibulum lorem sed risus ultricies tristique. Amet mattis vulputate enim nulla aliquet porttitor. Amet tellus cras adipiscing enim eu turpis egestas pretium. Nulla pellentesque dignissim enim sit amet venenatis. Sed velit dignissim sodales ut. Amet volutpat consequat mauris nunc congue. Morbi tristique senectus et netus. Suscipit tellus mauris a diam maecenas. Tellus in hac habitasse platea. Egestas sed tempus urna et. Dolor sit amet consectetur adipiscing elit duis tristique. Semper risus in hendrerit gravida. Interdum posuere lorem ipsum dolor sit amet consectetur. Praesent semper feugiat nibh sed pulvinar proin. Mi eget mauris pharetra et ultrices neque ornare aenean euismod.'], 
            ['2017-11-11 15:45:57', 'Title 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut tellus elementum sagittis vitae. Urna nec tincidunt praesent semper feugiat nibh. Et tortor consequat id porta nibh. Dictum fusce ut placerat orci nulla pellentesque. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Iaculis nunc sed augue lacus viverra vitae congue. Ante metus dictum at tempor commodo ullamcorper a lacus vestibulum. Venenatis a condimentum vitae sapien pellentesque habitant morbi tristique senectus. Nisi scelerisque eu ultrices vitae auctor eu augue ut. Lorem ipsum dolor sit amet consectetur.

Quam vulputate dignissim suspendisse in est ante in nibh mauris. Lorem ipsum dolor sit amet consectetur. Est sit amet facilisis magna etiam. Amet mattis vulputate enim nulla aliquet porttitor lacus. Porttitor rhoncus dolor purus non enim praesent elementum. Morbi enim nunc faucibus a. Est velit egestas dui id. Justo laoreet sit amet cursus sit. Suscipit tellus mauris a diam maecenas sed enim ut sem. Ut aliquam purus sit amet luctus. Augue interdum velit euismod in pellentesque massa placerat. Arcu dictum varius duis at. Integer enim neque volutpat ac tincidunt. Gravida in fermentum et sollicitudin. Magnis dis parturient montes nascetur ridiculus mus. Eu mi bibendum neque egestas congue quisque egestas diam. Felis eget nunc lobortis mattis aliquam faucibus purus in. Eu turpis egestas pretium aenean pharetra magna. Risus commodo viverra maecenas accumsan lacus vel facilisis. Facilisi morbi tempus iaculis urna id volutpat lacus.

Pellentesque dignissim enim sit amet venenatis urna cursus. Pellentesque elit eget gravida cum sociis natoque penatibus. Gravida cum sociis natoque penatibus et magnis dis parturient. Arcu non odio euismod lacinia at quis risus. Molestie at elementum eu facilisis sed odio morbi. Sed libero enim sed faucibus turpis in eu mi bibendum. Massa massa ultricies mi quis hendrerit. Vitae sapien pellentesque habitant morbi tristique. Metus vulputate eu scelerisque felis imperdiet proin fermentum leo. Duis ut diam quam nulla porttitor massa id neque aliquam. Justo donec enim diam vulputate ut pharetra. Leo vel orci porta non pulvinar neque laoreet.'],  
            ['2017-11-12 15:45:57', 'Title 4', '']  
          ];
        
        
        foreach ($posts as $key => $post) {
            Post::insert([
                'created_at' => $post[0],
                'updated_at' => $post[0],
                'title' => $post[1],
                'post' => $post[2]
            ]);
        }
    }
}
