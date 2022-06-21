<div>
    <input wire:model="search" list="movies-data" type="text" class="form-control" name="title" id="inputTitle" maxlength="100" value="{{ $oldValues['title'] ?? ''}}" aria-describedby="Nazwa filmu"  autocomplete="off">

    <datalist id="movies-data">
        @if(isset($movies))
            @foreach($movies as $movie)
                <option value="{{ $movie->title }}">
            @endforeach
        @endif
    </datalist>
</div>