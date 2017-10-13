<?php
namespace App\Listeners;

use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use App\FilePath;

class HasUploadedImageListener
{
    /**
     * Handle the event.
     *
     * @param  ImageWasUploaded  $event
     * @return void
     */
    public function handle(ImageWasUploaded $event)
    {
        // Get te public path to the file and save it to the database
        $publicFilePath = str_replace(public_path(), "", $event->path());
        FilePath::create(['path' => $publicFilePath]);
    }
}
