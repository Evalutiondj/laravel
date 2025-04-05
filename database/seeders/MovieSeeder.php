<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Đảm bảo có thư mục lưu
        Storage::disk('public')->makeDirectory('videos');
        Storage::disk('public')->makeDirectory('thumbnails');

        // Demo 1
        $video1 = 'demo-assets/videos/demo1.mp4';
        $thumbnail1 = 'demo-assets/thumbnails/demo1.jpg';

        $newVideo1 = 'videos/' . Str::random(10) . '.mp4';
        $newThumb1 = 'thumbnails/' . Str::random(10) . '.jpg';

        copy(public_path($video1), storage_path('app/public/' . $newVideo1));
        copy(public_path($thumbnail1), storage_path('app/public/' . $newThumb1));

        Movie::create([
            'title' => 'Demo Movie 1',
            'description' => 'Đây là phim mẫu số 1.',
            'video_path' => $newVideo1,
            'thumbnail' => $newThumb1,
            'views' => rand(100, 1000),
        ]);

        // Demo 2
        $video2 = 'demo-assets/videos/demo2.mp4';
        $thumbnail2 = 'demo-assets/thumbnails/demo2.jpg';

        $newVideo2 = 'videos/' . Str::random(10) . '.mp4';
        $newThumb2 = 'thumbnails/' . Str::random(10) . '.jpg';

        copy(public_path($video2), storage_path('app/public/' . $newVideo2));
        copy(public_path($thumbnail2), storage_path('app/public/' . $newThumb2));

        Movie::create([
            'title' => 'Demo Movie 2',
            'description' => 'Đây là phim mẫu số 2.',
            'video_path' => $newVideo2,
            'thumbnail' => $newThumb2,
            'views' => rand(100, 1000),
        ]);
    }
}
