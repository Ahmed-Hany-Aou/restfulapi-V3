<?php

namespace App;

use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    protected static function boot()
	{
		parent::boot();

		static::addGlobalScope(new SellerScope);
	}

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    //
    public function products()
    {
        return $this->hasMany(Product::class);
        }
}