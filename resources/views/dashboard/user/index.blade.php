@extends('dashboard.master')

@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{ route('user.create') }}">
    Crear
</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nom
            </td>
            <td>
                Cognom
            </td>
            <td>
                Surname
            </td>
            <td>
                Email
            </td>
            <td>
                Rol
            </td>
            <td>
                Creat
            </td>
            <td>
                Actualització
            </td>
            <td>
                Accions
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->surname }}
            </td>
            <td>
                {{ $user->username }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->rol->key }}
            </td>
            <td>
                {{ $user->created_at->format('d-m-Y') }}
            </td>
            <td>
                {{ $user->updated_at->format('d-m-Y') }}
            </td>
            <td>
                <a href="{{ route('user.show',$user->id) }}" class="btn btn-primary">Watch More</a>
                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary">Update</a>

                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}"
                    class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Segur que vols eliminar l usuari seleccionat?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <form id="formDelete" method="POST" action="{{ route('user.destroy',0) }}"
                    data-action="{{ route('user.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  action = $('#formDelete').attr('data-action').slice(0,-1)
  action += id
  console.log(action)

  $('#formDelete').attr('action',action)

  var modal = $(this)
  modal.find('.modal-title').text('Esborraràs usuari : ' + id)
})
</script>

@endsection