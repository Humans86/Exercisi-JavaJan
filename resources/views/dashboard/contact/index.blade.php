@extends('dashboard.master')

@section('content')


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
                Email
            </td>
            <td>
                Data Creació
            </td>
            <td>
               Data Actualització
            </td>
            <td>
                Accions
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>
                {{ $contact->id}}
            </td>
            <td>
                {{ $contact->name}}
            </td>
            <td>
                {{ $contact->surname}}
            </td>
            <td>
                {{ $contact->email}}
            </td>
            <td>
                {{ $contact->created_at->format('Y-M-d')}}
            </td>
            <td>
                {{ $contact->updated_at->format('d-m-y')}}
            </td>
            <td>
                <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-primary">Watch More</a>
                
            
                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $contact->id }}"
                    class="btn btn-danger">Delete</button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Segur que vols eliminar el registre seleccionat?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete"method="POST" action="{{route('contact.destroy','0')}}" data-action="{{ route('contact.destroy',0) }}">
            @method('DELETE')
           @csrf
           <button type="submit" class="btn btn-primary">Eliminar</button>
           </form>

           
        </div>
      </div>
    </div>
  </div>

  <script>
      window.onload = function () {
    $('#deleteModal').on('show.bs.modal', function (event) {
        //console.log ("modal obert") //Manera per la qual tenim per imprimir qualsevol tipus de text

        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

       action = $('#formDelete').attr('data-action').slice(0,-1) 
       action += id
       console.log(action)

       $('#formDelete').attr('action',action)

        var modal = $(this)
        modal.find('.modal-title').text('Eliminaras el Post: ' + id)
      })
      };
  </script>


@endsection