<?php 

namespace App\Helpers;


class Casitfy {

    protected mixed $data;

    public static function  process(mixed $data): static 
    {
        $instance = new static();
        $instance->data = $data;
        return $instance; 
    }

    public function toObject(): object
    {
        return (object) $this->data;
    }

    public function toArray(): array
    {
        return (array) $this->data;
    } 

    public function toTemplate(array $narration): string 
    {

        return __($this->data, $narration);
    }
}