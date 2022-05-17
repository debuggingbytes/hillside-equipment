<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  use HasFactory;

  protected $fillable = ['img_path', 'imagable_id', 'imagable_type'];

  public function imagables()
  {
    return $this->morphTo();
  }
}
