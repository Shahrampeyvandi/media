<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Members\Members;

class ConvertVideoForDownloading implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;

    public function __construct(Posts $post)
    {
        $this->post = $post;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lowBitrateFormat = (new X264)->setKiloBitrate(500);

        // open the uploaded video from the right disk...
        FFMpeg::fromDisk('uploads')
            ->open($this->post->content_link)

        // add the 'resize' filter...
            ->addFilter(function ($filters) {
                $filters->resize(new Dimension(960, 540));
            })

        // call the 'export' method...
            ->export()

        // tell the MediaExporter to which disk and in which format we want to export...
            ->toDisk('uploads')
            ->inFormat($lowBitrateFormat)

        // call the 'save' method with a filename...
            ->save($this->post->content_name . 'l.mp4');

        // update the database so we know the convertion is done!
        $this->post->update([
            'content_link_low' => Carbon::now(),
        ]);

    }
}
