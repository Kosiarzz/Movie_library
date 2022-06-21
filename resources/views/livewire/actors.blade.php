<div>
    <input wire:model="search" list="actors-data" type="text" class="form-control" name="actor" id="inputActor" maxlength="100" value="{{ $oldValues['actor'] ?? ''}}" aria-describedby="Aktor" autocomplete="off"/>
 
    <datalist id="actors-data">
        @if(isset($actors))
            @foreach($actors as $actor)
                <option value="{{ $actor->person }}" style="background:red;">
            @endforeach
        @endif
    </datalist>
</div>