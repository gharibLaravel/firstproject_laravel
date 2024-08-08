<div>
  <form wire:submit.prevent='save'>
    <div>
      <div class="mb-2">
        <input wire:model="nom" type="text"
          class="form-control form-control-sm ">
      </div>
      <div class="mb-2">
        <input wire:model="prenom" type="text"
          class="form-control form-control-sm ">

      </div>
      <div class="mb-2">
        <select type="text" wire:model.debounce.500ms='grade_id'
          class="form-control form-control-sm rounded">
          <option value="">Select Grade...</option>
          <option value="2">grade2</option>
          <option value="3">grade3</option>
          <option value="4">grade4</option>
          <option value="5">grade5</option>
          <option value="6">grade6</option>
        </select>
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" @click="$dispatch('create_pers')" class="btn btn-info">Reload List</button>
    </div>
  </form>

</div>
