# Laravel Filemanager Integration Demo - Events
This project already integrated [unisharp/laravel-filemanager](https://github.com/UniSharp/laravel-filemanager) with a clean Laravel. Allowing developers to try out all features without integrating into their projects. End-to-end tests are also included, which developers should test their codes before sending new pull requests.

## Init this project
1. Clone and cd into this project
2. `make init`
3. `php artisan serve`
4. Go to your browser and visit `localhost:8000/laravel-filemanager/demo`

## Eventing examples
This project provides examples on how to use the eventing system with [laravel-filemanager](https://github.com/UniSharp/laravel-filemanager).
The following events provide an example implementation:

#### ImageIsDeleting
This event is fired before an image is deleted. The event listener in [App\Listeners\DeleteImageListener](https://github.com/UniSharp/laravel-filemanager-demo-events/blob/master/app/Listeners/DeleteImageListener.php) does the following:
1. Extracts the file path of the file that is to be deleted
2. Searches the database for the file path
3. If a reference is found, formats a message and aborts the request

#### ImageIsRenaming
This event is fired just before an image is renamed. The event listener in [App\Listeners\RenameImageListener](https://github.com/UniSharp/laravel-filemanager-demo-events/blob/master/app/Listeners/RenameImageListener.php) does the following:
1. Extracts the old and new file path
2. Searches the database for the old path
3. Updates all records containing the old path

## Notes for developers
Remeber to run `make test`, make sure all tests are passed before sending new pull requests.
