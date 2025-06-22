<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_logo',
        'contact_email',
        'contact_phone',
        'contact_address',
        'footer_text',
        'facebook_url',
        'twitter_url',
        'instagram_url',
    ];
}
