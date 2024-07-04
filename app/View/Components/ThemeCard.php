<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ThemeCard extends Component
{
    public $theme;

    /**
     * Create a new component instance.
     *
     * @param $theme
     * @return void
     */
    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.theme-card');
    }
}