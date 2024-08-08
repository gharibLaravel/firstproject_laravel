<div class="container">
  <div class="row mb-3">
    <div class="col-md-3">
      <input wire:model='wnom' class="form-control rounded form-control-sm" type="search">
    </div>
    <div class="col-md-3">
      <select type="search" wire:model.debounce.500ms='grade' class="form-control form-control-sm rounded">
        <option value="">Select Grade...</option>
        <option value="2">grade2</option>
        <option value="3">grade3</option>
        <option value="4">grade4</option>
        <option value="5">grade5</option>
        <option value="6">grade6</option>
      </select>
    </div>
    <div class="col-md-3">
      <button wire:click="search" class="btn btn-primary btn-sm">Search</button>
    </div>
    <div class="col-md-3">
      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPersonne">Add</button>
    </div>
  </div>
  <table class="table table-bordered table-striped table-sm">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($personnes as $personne)
      <tr>
        <td>{{ $personne->id }}</td>
        <td>{{ $personne->nom }}</td>
        <td>{{ $personne->prenom }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $personnes->links() }}

  <div wire:ignore.self class="modal fade" id="addPersonne" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent='save'>
          <div class="modal-body">
            <div class="mb-2">
              <input wire:model="nom" type="text"
                class="form-control form-control-sm @error('nom') is-invalid @enderror">
              @error('nom')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-2">
              <input wire:model="prenom" type="text"
                class="form-control form-control-sm @error('prenom') is-invalid @enderror">
              @error('prenom')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
            <div class="mb-2">
              <select type="text" wire:model.debounce.500ms='grade_id'
                class="form-control form-control-sm rounded @error('grade_id') is-invalid @enderror">
                <option value="">Select Grade...</option>
                <option value="2">grade2</option>
                <option value="3">grade3</option>
                <option value="4">grade4</option>
                <option value="5">grade5</option>
                <option value="6">grade6</option>
              </select>
              @error('grade_id')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@script
<script>
    $wire.on('personneCreee', () => {
        $('#addPersonne').modal('hide');
    });
</script>
@endscript