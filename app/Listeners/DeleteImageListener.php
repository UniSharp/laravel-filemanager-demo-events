<?php
namespace App\Listeners;

use App\FilePath;
use Unisharp\Laravelfilemanager\Events\ImageIsDeleting;

class DeleteImageListener
{
    /**
     * Handle the ImageIsDeleting event.
     * If the image that is to be deleted exists inside the file_paths table,
     * block the deletion of that image and show appropriate response.
     *
     * @param  ImageIsDeleting  $event
     * @return void
     */
    public function handle(ImageIsDeleting $event)
    {
        // Get the public path for the file
        $publicFilePath = str_replace(public_path(), "", $event->path());

        // Search for usages of the file
        $used = FilePath::where('path', $publicFilePath)->get();

        if (count($used) > 0) {
            // The image is in use, create a response message
            $message = $this->formatMessage($used);

            // Die with response message
            die($message);
        }
    }

    private function formatMessage($files)
    {
        $message = "<p>The file you are trying to delete is in use in the file_paths table with the following id's:</p>";
        $message .= "<ul>";
        foreach ($files as $file) {
            $message .= "<li>$file->id</li>";
        }
        $message .= "</ul>";
        $message .= "<p>Please remove those database references before you can delete the file.</p>";
        return $message;
    }
}
