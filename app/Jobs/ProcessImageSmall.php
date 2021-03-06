<?php

namespace App\Jobs;

use App\Models\PostImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Intervention\Image;

class ProcessImageSmall implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PostImage $image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image = $this->image;

        $fullPath = public_path('images'.DIRECTORY_SEPARATOR.$image->image);
        $fullPathSmall = public_path('images'.DIRECTORY_SEPARATOR.'small'.DIRECTORY_SEPARATOR.$image->image);

        $img = ImageManagerStatic::make($fullPath)->resize(300,200);
        $img->save($fullPathSmall);
    }
}

