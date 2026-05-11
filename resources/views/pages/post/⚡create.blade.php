<?php

use Livewire\Component;

new class extends Component
{
    //

    public $count =0;

    public function increment(){
        $this->count++;
    }
};
?>

<div class="container text-center">

    {{-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci --}}
<h1>
{{ $count }}
</h1>

<button class="btn cursor-pointer " wire:click="increment">
+
</button>
</div>


<style>

.btn {
    background-color:#000;
    color:#fff;
    padding:8px 16px;
    border-radius:5px;
}

</style>