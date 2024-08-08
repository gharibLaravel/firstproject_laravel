<div class="container">
  <div class="col-md-3 mb-3">
    <input wire:model.live="search" type="search" class="form-control form-control-sm rounded">
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
      @foreach ($this->personnes as $personne)
      <tr>
        <td>{{ $personne->id }}</td>
        <td>{{ $personne->nom }}</td>
        <td>{{ $personne->prenom }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $this->personnes->links() }}

</div>
