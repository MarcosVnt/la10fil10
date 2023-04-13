<?php

use App\Models\Letraq;
use Livewire\Livewire;
use function Pest\Livewire\livewire;


/* beforeEach(function () {
    $this->actingAs(
        User::where('is_admin', true)->first()
    );
}); */
 
it('has posts page', function () {
    Livewire::test()->assertCanSeeTableRecords(
        Letraq::limit(10)->get()
    );
});