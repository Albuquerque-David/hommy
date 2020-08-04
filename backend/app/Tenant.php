<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Http\Requests\TenantRequest;


class Tenant extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    public function createTenant(TenantRequest $request)
    {
        $this->fillTenant($this,$request);
        $this->password = bcrypt($request->password);
        $this->save();
    }

    
    public function republics()
    {
        return $this->belongsTo('App\Republic');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private function fillTenant(Tenant $tenant, TenantRequest $request)
    {
        $tenant->name = $request->name == null ? $tenant->name : $request->name;
        $tenant->email = $request->email == null ? $tenant->email : $request->email;
        $tenant->password = $request->password == null ? $tenant->password : $request->password;
        $tenant->cpf = $request->cpf == null ? $tenant->cpf : $request->cpf;
        $tenant->phoneNumber = $request->phoneNumber == null ? $tenant->phoneNumber : $request->phoneNumber;
    }

}

