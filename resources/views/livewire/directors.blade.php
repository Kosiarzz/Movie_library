<div>
    <input wire:model="search" list="directors-data" type="text" class="form-control" name="director"  id="inputDirector" maxlength="100" value="{{ $oldValues['director'] ?? ''}}" aria-describedby="Reżyser" autocomplete="off"/>
    
    <datalist id="directors-data">
        @if(isset($directors))
            @foreach($directors as $director)
                <option value="{{ $director->person }}">
            @endforeach
        @endif
    </datalist>
</div>