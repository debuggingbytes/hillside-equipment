<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  use HasFactory;

  // Mass assignment
  protected $fillable = ['part_number', 'manufacture', 'description', 'quantity', 'img_path'];


  public function getBriefDescriptionAttribute()
  {

    return substr($this->description, 0, 60);
  }
}
