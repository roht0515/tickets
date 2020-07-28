@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Atencion</h1>
@stop

@section('content')
<div class="d-flex justify-content-between bd-highlight mb-3">
    <div>
        <button id="btn_edit"  onclick="editService()" type="button" class="btn btn-success">
            <i class="fas fa-edit"></i> Atender
        </button>
        <button id="btn_delete" type="button" onclick="deleteService()" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> 
        </button>
    </div>
    <button id="btn_new" onclick="addService()" type="button" class="btn btn-info" data-toggle="modal">
        <i class="fas fa-plus"></i> 
    </button>
</div>
@php
$headers = ['Codigo', 'tipo de cliente', 'estado', 'servicio', 'Fecha de creacion', 'id'];
$columns = [
    ['data'=>'codigo','name'=>'codigo'],
    ['data'=>'type_client','name'=>'type_client'],
    ['data'=>'state','name'=>'state'],
    ['data'=>'service_id','name'=>'service_id'],
    ['data'=>'created_at','name'=>'created_at'],
    ['data'=>'DT_RowId','name'=>'DT_RowId','visible' => false],
];
@endphp
<x-datatableComponent
    id="serviceTable"
    route="atencion.list"
    :columns="$columns"
    :headers="$headers"
/>

<x-form 
    title="Estados"
    idForm="ServiceModal"
    action="services.list"
    method="post"
    idModal="modal"
    size=""
    headerBg=""
    btnCloseClass="danger"
    btnCloseName="Cerrar"
    idBtnSubmit="btnForm"
    btnSubmitClass="success"
    btnSubmitName="Enviar" >
@include('administracion.estados.form.form')
</x-form>

@stop

@section('css')
    
@stop

@section('js')
<script>

</script>
@stop
