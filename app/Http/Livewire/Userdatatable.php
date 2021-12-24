<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\{ 
    Http\Livewire\LivewireDatatable,
    Column,
    NumberColumn,
    DateColumn
};

class Userdatatable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->checkbox(),  
            Column::name('name')->link('/', 'Modifier {{name}}')
                ->label('Nom')
                ->searchable(),
            Column::name('email')
                ->searchable(),
            Column::name('profile_photo_path')
            ,
            DateColumn::name('created_at')
                ->label('Date de création')
        ];
    }
}