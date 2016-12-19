<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseUserInterface;
use App\Interfaces\BaseCodeInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\CodeInterface;
use App\Interfaces\BaseActionInterface;
use App\Interfaces\ActionInterface;
use App\Interfaces\BaseRechargeInterface;
use App\Interfaces\RechargeInterface;
use App\Interfaces\BaseCathecticInterface;
use App\Interfaces\CathecticInterface;
use App\Interfaces\BaseSystemInterface;
use App\Interfaces\SystemInterface;
use App\Interfaces\BaseCashInterface;
use App\Interfaces\CashInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
     //      $this->app->when(RegisterService::class)
     //      ->needs(BaseUserInterface::class)
     //      ->give(RegisterInterface::class);
     // $this->app->when(UserService::class)
     //      ->needs(BaseUserInterface::class)
     //      ->give(UserInterface::class);

        
    $this->app->bind(BaseUserInterface::class,UserInterface::class);
    $this->app->bind(BaseCodeInterface::class,CodeInterface::class);
     $this->app->bind(BaseActionInterface::class,ActionInterface::class);
     $this->app->bind(BaseRechargeInterface::class,RechargeInterface::class);
      $this->app->bind(BaseCathecticInterface::class,CathecticInterface::class);
       $this->app->bind(BaseSystemInterface::class,SystemInterface::class);
       $this->app->bind(BaseCashInterface::class,CashInterface::class);
     // $this->app->bind('UserService',function(){
     //    return new UserInterface();
     //  });
     //  $this->app->bind('RegisterService',function(){
     //    return new RegisterInterface();
     //  });
    }
}
