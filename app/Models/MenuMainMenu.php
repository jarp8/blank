<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMainMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'url',
        'icon',
        'menu_position',
        'menu_main_menu_id',
        'menu_viewname_id'
    ];

    
    public function viewname()
	{
		return $this->belongsTo('App\Models\MenuViewname', 'menu_viewname_id');
	}
}
