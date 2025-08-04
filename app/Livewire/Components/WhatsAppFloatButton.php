<?php

namespace App\Livewire\Components;

use Livewire\Component;

class WhatsAppFloatButton extends Component
{
    public $phoneNumber = '';
    public $message = '';

    public function mount($phoneNumber = '', $message = '')
    {
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
    }

    public function openWhatsApp()
    {
        $baseUrl = 'https://wa.me/';
        $encodedMessage = urlencode($this->message);
        $whatsappUrl = $baseUrl . $this->phoneNumber;
        
        if (!empty($this->message)) {
            $whatsappUrl .= "?text={$encodedMessage}";
        }

        return $this->redirect($whatsappUrl, '_blank');
    }

    public function render()
    {
        return view('livewire.components.whats-app-float-button');
    }
}