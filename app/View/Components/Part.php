<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Part extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public $part;
  public function __construct($part)
  {
    //
    $this->part = $part;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.part', ['part' => $this->part]);
  }
}
