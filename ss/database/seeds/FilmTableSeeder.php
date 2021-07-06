<?php

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Film::count() == 0) {
            Film::firstOrCreate([
                'name' => 'Vệt nắng cuối trời',
                'author' => 'N/A',
                'cast' => 'Nope',
                'country' => '1',
                'category_id' => '1',
                'episodes' => '20',
                'description' => 'Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim',
                'star' => '5',
                'release_date' => '2015-10-28 19:18:44',
                'type_id' => '1',
                'image' => 'https://img.vncdn.xyz/uploads/images/kyuukyoku-shinka-shita-full-dive-rpg-ga-genjitsu-yori-mo-kusoge-dattara-f3357.jpg',
                'banner' => 'https://i.ibb.co/SNSF088/home-slide1.png',
                'running_time' => '115 phút',
                'time_slot' => 'Thứ 5, 19h00',
                'status' => '1',
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
            ]);
            Film::firstOrCreate([
                'name' => 'Ngày mai trời lại sáng',
                'author' => 'N/A',
                'cast' => 'Nope',
                'country' => '1',
                'category_id' => '2',
                'episodes' => '20',
                'description' => 'Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim',
                'star' => '5',
                'release_date' => '2015-10-28 19:18:44',
                'type_id' => '1',
                'image' => 'https://img.vncdn.xyz/uploads/images/doc-bo-tieu-dao-f3199.jpg',
                'banner' => 'https://i.ibb.co/SNSF088/home-slide1.png',
                'running_time' => '115 phút',
                'time_slot' => 'Thứ 5, 19h00',
                'status' => '1',
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
            ]);
            Film::firstOrCreate([
                'name' => 'Thám tử lừng danh',
                'author' => 'N/A',
                'cast' => 'Nope',
                'country' => '1',
                'category_id' => '1',
                'episodes' => '20',
                'description' => 'Mở đầu câu truyện, cậu học sinh trung học 17 tuổi (trong truyện
                    tranh là 16) Shinichi Kudo (Jimmy Kudo) bị biến thành cậu bé Conan
                    Edogawa. Shinichi trong phần đầu của Thám tử lừng ...',
                'star' => '5',
                'release_date' => '2015-10-28 19:18:44',
                'type_id' => '1',
                'image' => 'https://img.vncdn.xyz/uploads/images/kyuukyoku-shinka-shita-full-dive-rpg-ga-genjitsu-yori-mo-kusoge-dattara-f3357.jpg',
                'banner' => 'https://i.ibb.co/SNSF088/home-slide1.png',
                'running_time' => '115 phút',
                'time_slot' => 'Thứ 5, 19h00',
                'status' => '1',
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
            ]);
            Film::firstOrCreate([
                'name' => 'Kaguya-sama wa Kokurasetai: Tensai-tachi no Renai Zunousen OVA',
                'author' => 'N/A',
                'cast' => 'Nope',
                'country' => '1',
                'category_id' => '2',
                'episodes' => '20',
                'description' => 'Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim',
                'star' => '5',
                'release_date' => '2015-10-28 19:18:44',
                'type_id' => '1',
                'image' => 'https://img.vncdn.xyz/uploads/images/kyuukyoku-shinka-shita-full-dive-rpg-ga-genjitsu-yori-mo-kusoge-dattara-f3357.jpg',
                'banner' => 'https://i.ibb.co/SNSF088/home-slide1.png',
                'running_time' => '115 phút',
                'time_slot' => 'Thứ 5, 19h00',
                'status' => '1',
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
            ]);
            Film::firstOrCreate([
                'name' => 'Super Cub',
                'author' => 'N/A',
                'cast' => 'Nope',
                'country' => '1',
                'category_id' => '1',
                'episodes' => '20',
                'description' => 'Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim Đây là mô tả phim',
                'star' => '5',
                'release_date' => '2015-10-28 19:18:44',
                'type_id' => '1',
                'image' => 'https://img.vncdn.xyz/uploads/images/kyuukyoku-shinka-shita-full-dive-rpg-ga-genjitsu-yori-mo-kusoge-dattara-f3357.jpg',
                'banner' => 'https://i.ibb.co/SNSF088/home-slide1.png',
                'running_time' => '115 phút',
                'time_slot' => 'Thứ 5, 19h00',
                'status' => '1',
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
            ]);
        }
    }
}
