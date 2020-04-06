@extends('layouts.app')
@section('styles_additional')

@endsection
@section('script_additional')
<script type="text/javascript">
    $('a').click(function() 
    {
        $('#delete_beneficiario').attr('action', $(this).data('link'));
    });

      $("#modal-btn-si").on("click", function(){
        $("#delete_beneficiario").submit();
        $("#mi-modal").modal('hide');
    });

      $("#modal-btn-no").on("click", function(){
        $("#mi-modal").modal('hide');
    });
</script>
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col col-lg-1"></div>
        <div class="col col-md-10">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="float-right close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                {{ session('status') }}
            </div>
            @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Listado de Beneficiarios
                    </h4>
                    @if ($beneficiarios->count()>0)
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabla_solicitudes">
                            <thead>
                                <tr>
                                    <th>Nombre</th>                                    
                                    <th>Cedula</th>                                    
                                    <th>Teléfono</th>                                    
                                    <!-- <th>Correo</th>                                     -->
                                    <th>Farmacia</th>                                    
                                    <th>Centro Médico</th>                                    
                                    <th>Fecha de Dialisis</th>                                    
                                    <th>Hora de Dialisis</th>                                    
                                    <th>Fecha de Retiro</th>                                    
                                    <th>Acciones</th>                                    

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beneficiarios as $beneficiario) 
                               <tr>
                                    <td class="text-capitalize">
                                        {{ $beneficiario->nombre }}
                                    </td>

                                    <td class="text-capitalize">
                                        {{ $beneficiario->cedula }}
                                    </td>   

                                    <td class="text-capitalize">
                                        {{ $beneficiario->telefono }}
                                    </td>

                            <!--         <td class="text">
                                        {{ $beneficiario->correo }}
                                    </td>
 -->
                                    <td class="text-capitalize">
                                        {{ $beneficiario->farmacia->nombre }}
                                    </td>

                                    <td class="text-capitalize">
                                        {{ $beneficiario->centro_medico->nombre }}
                                    </td>

                                    <td class="text-capitalize">
                                        {{ $beneficiario->fecha_dialisis }}
                                    </td>

                                    <td class="text-capitalize">
                                        {{ $beneficiario->hora_dialisis }}
                                    </td>

                                    <td class="text-capitalize">
                                        {{ $beneficiario->fecha_retiro }}
                                    </td>                                    

                                    <td class="text-center">
                                        <a class="text-default" href="{{ route('beneficiarios.edit', [encrypt($beneficiario->id)]) }}" title="Editar Beneficiario">
                                            <i class="fas fa-th-list"></i>
                                        </a>
                                        <form id="delete_beneficiario" action="#" method="POST" style="display: none;" >
                                            {!! method_field('DELETE') !!}                                                
                                            {!! csrf_field() !!}
                                        </form>
                                        <a data-toggle="modal" data-target="#mi-modal" data-link="{{ route('beneficiarios.destroy', [encrypt($beneficiario->id)]) }}" id="btn-confirm.{{$beneficiario->id}}" title="Eliminar Beneficiario" class="float-right text-danger m-r-5">
                                            <i class="fas fa-trash"></i>
                                        </a>     
                                  <!--  -->
                                    <!--  -->
                                    </td>                                
                                </tr>
                                @endforeach
                                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">¿Esta seguro que desea eliminar este registro?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a  id="modal-btn-si" href="#"  class="btn btn-outline-info">
                                                Si
                                            </a>
                                            <a id="modal-btn-no" class="btn btn-outline-danger">
                                                No
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-danger">
                        Aún no ha registrado ninguna solicitud.
                    </div>
                    @endif
                    <div class="form-group m-t-40">
                        <div class="col-12">
                            <a href="{{route('beneficiarios.create')}}" class="btn btn-outline-info">
                                Nuevo Beneficiario
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col col-lg-1"></div>
    </div>
@endsection

