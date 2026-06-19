<?php

namespace App\Traits;

trait BootstrapTrait
{
    public function openModal(string $modalId): void
    {
        $this->js("bootstrap.Modal.getOrCreateInstance(document.getElementById('$modalId')).show()");
    }

    public function dispatchModal(string $modalId): void
    {
        $this->js("bootstrap.Modal.getOrCreateInstance(document.getElementById('$modalId')).show()");
    }
    public function dismissModal(string $modalId): void
    {
        $this->js("bootstrap.Modal.getInstance(document.getElementById('$modalId')).hide()");
    }
}
