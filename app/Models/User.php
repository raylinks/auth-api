<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    /** @var string SUPER_ADMIN_ROLE */
    public const SUPER_ADMIN_ROLE = 'Super Admin';

    /** @var string ADMIN_ROLE */
    public const ADMIN_ROLE = 'Admin';

    /** @var string SUPERVISOR_ROLE */
    public const SUPERVISOR_ROLE = 'Supervisor';


    /** @var string PAXFUL_AGENT_ROLE */
    public const DOCTOR = 'doctor';

    /** @var string USER_ROLE */
    public const PATIENT = 'patient';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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

      /**
     * Check if logged in user has the "Admin" role.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(self::ADMIN_ROLE);
    }

    /**
     * Check if logged in user has the "Super Admin" role.
     *
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(self::SUPER_ADMIN_ROLE);
    }

    /**
     * Check if logged in user has the "Operating Agent" role.
     *
     * @return bool
     */
    public function isDoctor(): bool
    {
        return $this->hasRole(self::DOCTOR);
    }

    /**
     * Check if logged in user has the "Paxful Agent" role.
     *
     * @return bool
     */
    public function isPatient(): bool
    {
        return $this->hasRole(self::PATIENT);
    }

    /**
     * Check if logged in user has the "supervisor" role.
     *
     * @return bool
     */
    public function isSupervisor(): bool
    {
        return $this->hasRole(self::SUPERVISOR_ROLE);
    }

}
