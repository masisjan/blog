<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'phone', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new FilterScope());
        static::addGlobalScope(new SearchScope());
    }
}

/*

php artisan tinker
use App\Company
use App\Contact
$company = Company::first()
$contact1 = new Contact
$contact1->first_name = "FirstName 1"
$contact1->last_name = "LastName 1"
$contact1->email = "firstname1@gmail.com"
$contact1->address = "Address 1"
$contact1->company_id = $company->id
$contact1->save()

$contact2 = new Contact
$contact2->first_name = "FirstName 2"
$contact2->last_name = "LastName 2"
$contact2->email = "firstname2@gmail.com"
$contact2->address = "Address 2"
$company->contacts()->save($contact2)

$contact1->delete()
$contact2->delete()

$contact1 = new Contact
$contact1->first_name = "FirstName 1"
$contact1->last_name = "LastName 1"
$contact1->email = "firstname1@gmail.com"
$contact1->address = "Address 1"

$contact2 = new Contact
$contact2->first_name = "FirstName 2"
$contact2->last_name = "LastName 2"
$contact2->email = "firstname2@gmail.com"
$contact2->address = "Address 2"

$contacts = [
    $contact1,
    $contact2
]
$company->contacts()->saveMany($contacts)

$contact3 = [
    "first_name" => "FirstName 3",
    "last_name" => "LastName 3",
    "email" => "firstname3@gmail.com",
    "address" => "Address 3"
]
$company->contacts()->create($contact3)


$contact1 = [
    "first_name" => "FirstName 1",
    "last_name" => "LastName 1",
    "email" => "firstname1@gmail.com",
    "address" => "Address 1"
]

$contact2 = [
    "first_name" => "FirstName 2",
    "last_name" => "LastName 2",
    "email" => "firstname2@gmail.com",
    "address" => "Address 2"
]

$contacts = [
    $contact1,
    $contact2
]

$company->contacts()->createMany($contact3)

*/
