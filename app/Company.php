<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
//    protected $table = "companies";
//    protected $guarded = [];
    protected $fillable = ['name', 'address', 'email', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

/*

php artisan tinker
use App\Company
Company::all()
Company::take(3)  return builder
Company::take(3)->get() return collection
Company::take(3)->get()->all() return array of collection
Company::first()
Company::find(3)
Company::find([1, 2, 3])
Company::where('website', 'considine.info')  return builder
Company::where('website', 'considine.info')->first()
Company::where('website', 'considine.info')->get()
Company::whereWebsite('considine.info')->get()
$company = new Company()
$company->name = "Company 1"
$company->address = "Company 1 address"
$company->website = "company1website.com"
$company->email = "company1@email.com"
$company->save()
$company->website = "otherwebsite.com"
$company->save()
$company = Company::find(11)
$company->delete()
$company->destroy(11)
$company->destroy([7, 8, 9])
php artisan tinker
$data = [
    "name" => "Company 11",
    "address" => "Company 11 address",
    "email" => "company11@email.com",
    "website" => "company11website.com"
]
Company::create($data)   //good

$data = [
    "name" => "Company 11",
    "address" => "Company 11 address",
    "email" => "company11@email.com",
    "website" => "company11website.com",
    "contact" => "all contact"
]
Company::create($data)   //mass assignment error
$company = Company::first()
$company->update($data)


php artisan tinker
use App\Company
use App\Contact
$company = Company::first()
$company->contacts()
$company->contacts()->get()
$company->contacts()->find(7)
$company->contacts()->orderBy('id', 'desc')->first()
$company->contacts


$contact = Contact::first()
$contact->company()
$contact->company
$contact->company()->first()
$contact->company->name

$company->contacts()->first()->delete()
$company->contacts()->delete()

$company->contacts
$company->load('contacts')
$company->contacts

*/

