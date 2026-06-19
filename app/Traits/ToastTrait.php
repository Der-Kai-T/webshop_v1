<?php

namespace App\Traits;

trait ToastTrait
{
    public function successToast(string $subject = 'saved', string $message = ''): void
    {
        $this->dispatch('toastMagic',
            status: 'success',
            title: __($subject),
            message: __($message),
            options: [
                'showCloseBtn' => true,
            ],
        );
    }

    public function errorToast(string $subject = 'error', string $message = ''): void
    {
        $this->dispatch('toastMagic',
            status: 'error',
            title: __($subject),
            message: __($message),
            options: [
                'showCloseBtn' => true,
            ],
        );
    }

    public function notFoundToast(): void
    {
        $this->dispatch('toastMagic',
            status: 'error',
            title: __('not found'),
            message: __('entry not found'),
            options: [
                'showCloseBtn' => true,
            ],
        );
    }
}
