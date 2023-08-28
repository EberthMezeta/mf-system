<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <form wire:submit.prevent="createFamily">
        <input wire:model="name" type="text" placeholder="Nombre">
        <input wire:model="comments" type="text" placeholder="Comentarios (Opcional)">
        <button type="submit">Crear Familia</button>
    </form>

</div>
