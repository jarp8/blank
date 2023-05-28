<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemHomeCreditCard extends Model
{
	use HasFactory;
	
	protected $table = 'tem_home_credit_cards';
	protected $fillable = ['name', 'image', 'url', 'is_active', 'notes', 'created_by', 'updated_by', 'created_at', 'updated_at'];

	public function createdBy()
	{
		return $this->belongsTo('App\Models\User', 'created_by');
	}
	public function updatedBy()
	{
		return $this->belongsTo('App\Models\User', 'updated_by');
	}
	
}