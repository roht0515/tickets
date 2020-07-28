@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tipos de clientes</h1>
@stop


@section('content')
<div class="d-flex justify-content-between bd-highlight mb-3">
    <div>
        <button id="btn_edit"  onclick="editService()" type="button" class="btn btn-success">
            <i class="fas fa-edit"></i> Editar
        </button>
        <button id="btn_delete" type="button" onclick="deleteService()" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
    </div>
    <button id="btn_new" onclick="addService()" type="button" class="btn btn-info" data-toggle="modal">
        <i class="fas fa-plus"></i> Nuevo tipo de cliente
    </button>
</div>
@php
$headers = ['Nombre',  'Prioridad', 'Fecha de creacion', 'Fecha de actualizacion', 'id'];
$columns = [
    ['data'=>'name','name'=>'name'],
    ['data'=>'priority_id','name'=>'priority_id'],
    ['data'=>'created_at','name'=>'created_at'],
    ['data'=>'updated_at','name'=>'updated_at'],
    ['data'=>'DT_RowId','name'=>'DT_RowId','visible' => false],
];
@endphp
<x-datatableComponent
    id="serviceTable"
    route="client.list"
    :columns="$columns"
    :headers="$headers"
/>

<x-form 
    title="Tipo Cliente"
    idForm="ServiceModal"
    action="client.list"
    method="post"
    idModal="modal"
    size=""
    headerBg=""
    btnCloseClass="danger"
    btnCloseName="Cerrar"
    idBtnSubmit="btnForm"
    btnSubmitClass="success"
    btnSubmitName="Enviar" >
    <div class="form-group">
        <input type="hidden" class="form-control" id="idClient"  name="id" placeholder="id">
        <label for="">Tipo cliente</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Tipo de cliente">
        <label for="">Prioridad</label>
        <select name="priority_id" class="form-control" id="priority_id">
            @foreach ($priorities as $item)
                <option value="{{$item->id}}">{{$item->level_priority . " - ".  $item->name}}</option>
            @endforeach
        </select>
    </div>
</x-form>

@stop

@section('css')
    
@stop

@section('js')
<script>
    let crear = true;
    function getId(){
        let dato = $('.selected').attr('id');
        return dato;
    }

    $('#serviceTable').on( 'click', 'tbody tr', function (row) {
        let dato = $('.selected').attr('id');
        console.log(dato);
    } );
    
    function addService() {
        crear = true;
        $('#ServiceModal').trigger('reset');
        $('#idClient').val(getId());
        $('#modal').modal('show');
        
    }

    function editService() {
        crear= false;
        let id = getId();
        $.ajax({
            type: "GET",
            url: "{{ route('getClient') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
            },
            dataType: "JSON",
            success: function (data) {
               let name =  data["data"][0].name;
               let id = data['data'][0].id;
                $('#idClient').val(id);
                $('#name').val(name);
                $('#modal').modal('show');
            },
            error: function (error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salio mal, intente nuevamente',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }

    function deleteService () {
        let id = $('.selected').attr('id');
        if(id == undefined) {
            Swal.fire({
                title: 'Error!',
                text: 'Porfavor seleccione una fila',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
                $.ajax({
                        type: "POST",
                        url: "{{route('deleteClient')}}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        dataType: "JSON",
                        success: function (data) {
                            table.ajax.reload();
                            console.log(data);
                            Swal.fire({
                                title: 'Exito!',
                                text: data.data,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error:function (data){
                            console.log(data);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Algo salio mal, intente nuevamente',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        complete:function ()
                        {
                            
                        }
                    });
        }
    }
    
    $('#ServiceModal').validate({
            rules:{
                name:{
                    required:true,
                   
                },
            },
            messages:{
                name: {
                    required :"El campo de nombre es requerido",
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form)
            {   $route = "";
                let formData = $(form).serialize();  
                if(crear) {
                    $route = "{{route('storeClient')}}"
                }
                else {
                    $route = "{{route('editClient')}}"
                }
                $.ajax({
                        type: "POST",
                        url: $route,
                        data: formData,
                        dataType: "JSON",
                        success: function (data) {
                            table.ajax.reload();
                            console.log(data);
                            $('#modal').modal('hide');
                            Swal.fire({
                                title: 'Exito!',
                                text: data.data,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $(form).trigger('reset');
                        },
                        error:function (data){
                            console.log(data);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Algo salio mal, intente nuevamente',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        complete:function ()
                        {
                            
                        }
                    });
            }
        })

</script>
@stop
