
<div class="modal fade" id="modalrol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="LimpiarUsuariosRoles()">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Gestion Usuarios</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend>Relacion Usuario - Roles</legend> 


                    <div class="espacio15"> </div>
                    <center>
                        <table>
                            <tr>
                                <td> Tu No Tienes Nada
                                    <select name="usurol" id="usurol" multiple="multiple" style ="width:250px;height:400px;font-size:small;" >
                                </td>
                                <td>
                                    &nbsp;
                                    <button type="button" id="btnQuitar" name="btnQuitar"> >> </button>	
                                    &nbsp;
                                    <br /><br />
                                    &nbsp;
                                    <button type="button" id="btnAsociar" name="btnAsociar" class="asociar"> << </button>	
                                    &nbsp;
                                </td>
                                <td>
                                   Tengo Tengo Tengo  
                                    <select name="usu" id="usu" multiple="multiple" style ="width:250px;height:400px;font-size:small;" ></select>							
                                </td>
                            </tr>
                        </table>
                    </center>
                </fieldset>
                <input type="hidden" id="valor" />

                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="LimpiarUsuariosRoles()"><i class="fa fa-times"></i> Volver</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar"><i class="fa fa-user"></i> Guardar Cambios </button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
