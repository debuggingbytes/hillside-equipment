<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ServiceCard extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */

  public $idtag, $css, $heading, $paragraph;

  public function __construct($idtag, $css, $heading, $paragraph)
  {
    //
    $this->idtag = $idtag;
    $this->css = $css;
    $this->heading = $heading;
    $this->paragraph = $paragraph;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.service-card');
  }
}
