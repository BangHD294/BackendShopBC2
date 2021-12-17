<?php

namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess(){
        $this->defineGateCategory();
        $this->definGateMenu();

    }
    public function defineGateCategory(){
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    public function definGateMenu(){
        Gate::define('menu-list', 'App\Policies\MenuPolicy@view');
        Gate::define('menu-add', 'App\Policies\MenuPolicy@create');
        Gate::define('menu-edit', 'App\Policies\MenuPolicy@update');
        Gate::define('menu-delete', 'App\Policies\MenuPolicy@delete');
    }
}
