<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('rupiah', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>,-"; });
        Blade::directive('niqab', function ( $expression )
        {
          if($expression == 1)
          {
            return "<?php echo <span class='badge badge-success'>Niqab</span> ?>";
          }
        });
        Blade::directive('pet', function ( $expression )
        {
          if($expression == 1)
          {
            return "<?php echo <span class='badge badge-primary'>Pet</span> ?>";
          }
        });
    }
}
