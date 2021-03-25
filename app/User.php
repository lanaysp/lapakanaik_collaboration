<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Province;
use App\Models\Regency;
use Laravelista\Comments\Commenter;
use App\Notifications\CustomVerifyEmailNotification;
use App\Notifications\CustomResetPasswordNotification;
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email', 'password', 'roles', 'nama_majelis', 'email_majelis', 'wa_majelis',
        'alamat_majelis', 'sejarah_majelis', 'provinces_id', 'regencies_id', 'layanan_majelis', 'pengurus_majelis', 'zip_code', 'photo', 'visi_majelis' , 'misi_majelis','fb', 'ig', 'tt' , 'yt', 'tw'
    ];


    public function provinsi()
    {
        return $this->belongsTo(Province::class,'provinces_id','id');
    }
    // lagi
    public function kota()
    {
        return $this->belongsTo(Regency::class,'regencies_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('l, d F Y H:i');
    }
      // Tambahan profile
    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

     public function sendEmailVerificationNotification()

    {

        $this->notify(new CustomVerifyEmailNotification);

    }

       public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

}
