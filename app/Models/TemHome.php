<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemHome extends Model
{
	use HasFactory;
	
	protected $table = 'tem_homes';
	protected $fillable = ['title', 'description', 'image', 'is_active', 'notes', 'created_by', 'updated_by', 'created_at', 'updated_at'];

	public function createdBy()
	{
		return $this->belongsTo('App\Models\User', 'created_by');
	}
	public function updatedBy()
	{
		return $this->belongsTo('App\Models\User', 'updated_by');
	}
	
}