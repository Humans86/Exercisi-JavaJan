@extends('dashboard.master')

@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{ route('category.create') }}">
    Crear
</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Titol
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
        @foreach ($categories as $category)
        <tr>
            <td>
                {{ $category->id }}
            </td>
            <td>
                {{ $category->title }}
            </td>
            
            <td>
                {{ $category->created_at->format('d-m-Y') }}
            </td>
            <td>
                {{ $category->updated_at->format('d-m-Y') }}
            </td>
            <td>
                <a href="{{ route('category.show',$category->id) }}" class="btn btn-primary">Watch More</a>
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary">Update</a>

                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}"
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
                <p>Segur que vols esborrar el registre?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <form id="formDelete" method="POST" action="{{ route('category.destroy',0) }}"
                    data-action="{{ route('category.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function () {
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
            modal.find('.modal-title').text('Esborraràs la categoria: ' + id)
        })
    }
</script>

@endsection