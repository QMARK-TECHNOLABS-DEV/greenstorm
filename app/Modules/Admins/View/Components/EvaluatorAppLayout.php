<?php

namespace App\Modules\Admins\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class EvaluatorAppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('evaluator.layouts.app');
    }
}
