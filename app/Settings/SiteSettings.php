<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public bool $is_maintenance;
    public string $name;
    public ?string $logo;
    public ?string $tagline;
    public ?string $description;
    public string $default_language;
    public string $timezone;
    public string $copyright_text;
    public ?string $terms_url;
    public ?string $privacy_url;
    public ?string $cookie_policy_url;
    public ?string $custom_404_message;
    public ?string $custom_500_message;
    public string $company_name;
    public string $company_email;
    public string $company_phone;
    public string $company_address;

    public static function group(): string
    {
        return 'sites';
    }
    
    /**
     * Get the logo URL with fallback
     */
    public function getLogoUrl(): string
    {
        if ($this->logo) {
            return \Storage::url($this->logo);
        }
        
        return asset('assets/img/logo-dark.png');
    }
    
    /**
     * Get company contact information as array
     */
    public function getContactInfo(): array
    {
        return [
            'name' => $this->company_name,
            'email' => $this->company_email,
            'phone' => $this->company_phone,
            'address' => $this->company_address,
        ];
    }
    
    /**
     * Check if maintenance mode is enabled
     */
    public function isMaintenanceMode(): bool
    {
        return $this->is_maintenance;
    }
    
    /**
     * Get formatted copyright text
     */
    public function getCopyrightText(): string
    {
        return str_replace(
            ['{year}', '{company}'],
            [date('Y'), $this->company_name],
            $this->copyright_text
        );
    }
}