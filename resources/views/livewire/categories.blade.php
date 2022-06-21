<div>
    <input wire:model="search" list="categories-data" type="text" class="form-control" name="category" maxlength="100" value="{{ $oldValues['category'] ?? ''}}" id="inputCategory" aria-describedby="Aktor" autocomplete="off">
 
    <datalist id="categories-data">
        @if(isset($categories))
            @foreach($categories as $category)
                <option value="{{ $category->name }}">
            @endforeach
        @endif
    </datalist>
</div>
