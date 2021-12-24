<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\{User, Speculation, Plantation, Cooperative};

class HomeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)  
    {
        $view->with([//modelBDD==modelsClass
            'users' => User::all(),
            'speculations' => Speculation::all(),
            'plant' => User::with('plantations'),
            'cooperatives'    => Cooperative::all(),
        ]);

        
    }
}