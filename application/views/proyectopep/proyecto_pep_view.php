<script type="text/javascript">        
    $(document).ready(function(){    
        $('#pestanias').tabs();
        function validaMunicipio(value, colname) {
            if (value == 0 ) return [false,"Seleccione el municipio del proyecto"];
            else return [true,""];
        }
        /*GRID PARTICIPANTES*/
<?php foreach ($regiones as $region) { ?>
            $("#agregar<?php echo $region->reg_id; ?>").button();
            $("#editar<?php echo $region->reg_id; ?>").button();
            
            var tabla=$("#t<?php echo $region->reg_id; ?>");
            tabla.jqGrid({
                //url: 'welcome/muestraArticulos',
                //editurl:'welcome/gestionArticulo',
                datatype:'json',
                altRows:true,
                height: "100%",
                hidegrid: false,
                colNames:['pro_pep_id','Nombre Proyecto','Departamento','Municipio','Etapa I','Etapa II','Etapa III','Etapa IV'],
                colModel:[
                    {name:'pro_pep_id',index:'pro_pep_id', editable:false,editoptions:{size:15} },
                    {name:'pro_pep_nombre',index:'pro_pep_nombre',editable:true,
                        edittype:"textarea",editoptions:{rows:"2",cols:"30"}, 
                        formoptions:{label: "Nombre",elmprefix:"(*)"},
                        editrules:{required:true} 
                    },
                    {name:'dep_id',index:'dep_id',editable:true,
                        edittype:"select",
                        editoptions:{ dataUrl:'<?php echo base_url('componente2/proyectoPep/cargarDepartamentos?reg_id='.$region->reg_id); ?>',buildSelect:'true'}, 
                        formoptions:{ label: "Departamento",elmprefix:"(*)"},
                        editrules:{custom:true, custom_func:validaMunicipio}
                    },
                    {name:'mun_id',index:'mun_id',editable:true,
                        edittype:"select",
                        editoptions:{ dataUrl:''}, 
                        formoptions:{ label: "Municipio",elmprefix:"(*)"},
                        editrules:{custom:true, custom_func:validaMunicipio}
                    },
                    {name:'etapa1',index:'etapa1',editable:false,
                        edittype:"checkbox",width:60,
                        editoptions: { value:"SI:NO" }
                    },
                    {name:'etapa2',index:'etapa2',editable:false,
                        edittype:"checkbox",width:60,
                        editoptions: { value:"SI:NO"}
                    },
                    {name:'etapa3',index:'etapa3',editable:false,
                        edittype:"checkbox",width:60,
                        editoptions: { value:"SI:NO"}
                    },
                    {name:'etapa4',index:'etapa4',editable:false,
                        edittype:"checkbox",width:60,
                        editoptions: { value:"SI:NO"}
                    }
                ],
                multiselect: false,
                caption: "Proyectos PEP",
                rowNum:10,
                rowList:[10,20,30],
                loadonce:true,
                pager: jQuery('#pager<?php echo $region->reg_id; ?>'),
                viewrecords: true     
            }).jqGrid('navGrid','#pager<?php echo $region->reg_id; ?>',
            {edit:false,add:false,del:false,search:false,refresh:false,
                beforeRefresh: function() {
                    tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}
                ).trigger('reloadGrid');}
            }
        ).hideCol(['pro_pep_id']);
            /* Funcion para regargar los JQGRID luego de agregar y editar*/
            function despuesAgregarEditar() {
                tabla.jqGrid('setGridParam',{datatype:'json',loadonce:true}).trigger('reloadGrid');
                return[true,'']; //no error
            }
                            
            //AGREGAR
            $("#agregar<?php echo $region->reg_id; ?>").click(function(){
                tabla.jqGrid('editGridRow',"new",
                {closeAfterAdd:true,addCaption: "Agregar ",width:'400',
                    reloadAfterSubmit:true,top:'300',left:'300',
                    processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                    bottominfo:"Campos marcados con (*) son obligatorios", 
                    onclickSubmit: function(rp_ge, postdata) {
                        $('#mensaje').dialog('open');
                    }
                });
            });

            //EDITAR
            $("#editar<?php echo $region->reg_id; ?>").click(function(){
                var gr = tabla.jqGrid('getGridParam','selrow');
                if( gr != null )
                    tabla.jqGrid('editGridRow',gr,
                {closeAfterEdit:true,editCaption: "Editando ",
                    top:'300',left:'300',width:'400',
                    align:'center',reloadAfterSubmit:true,
                    processData: "Cargando...",afterSubmit:despuesAgregarEditar,
                    bottominfo:"Campos marcados con (*) son obligatorios", 
                    onclickSubmit: function(rp_ge, postdata) {
                        $('#mensaje').dialog('open');
                        ;}
                });
                else $('#mensaje2').dialog('open'); 
            });
                
   <?php } ?>
        /*DIALOGOS DE VALIDACION*/
        $('.mensaje').dialog({
            autoOpen: false,
            width: 300,
            buttons: {
                "Ok": function() {
                    $(this).dialog("close");
                }
            }
        });
        /*FIN DIALOGOS VALIDACION*/
   
    });
</script>
<h2 class="demoHeaders" align="Center">Proyectos PEP</h2>
<p>En las siguientes pestañas se muestran los proyectos PEP que actualmente estan 
    desarrollandose en el Programa de Fortalecimiento de Gobiernos Locales. Estos proyectos
    estan dividos por las 5 regiones que conforman El Salvador.</p>
<div id="pestanias">
    <ul>
        <?php foreach ($regiones as $region) { ?>
            <li><a href="#<?php echo $region->reg_id; ?>"><?php echo $region->reg_nombre; ?></a></li>
        <?php } ?>
    </ul>
    <?php foreach ($regiones as $region) { ?>
        <div id="<?php echo $region->reg_id; ?>">
            <table id="t<?php echo $region->reg_id; ?>"></table>
            <div id="pager<?php echo $region->reg_id; ?>"></div>
            <center>
                <input type="button" id="agregar<?php echo $region->reg_id; ?>" value="  Agregar  " />
                <input type="button" id="editar<?php echo $region->reg_id; ?>" value="   Editar   " />
                
            </center>
            <?php echo base_url('componente2/proyectoPep/cargarDepartamentos?reg_id='.$region->reg_id); ?>
        </div>
    <?php } ?>
</div>
<!-- SON LOS MENSAJES DE VALIDACION DE CAMPOS -->
<div id="mensaje" class="mensaje" title="Aviso de la operación">
    <p>La acción fue realizada con satisfacción</p>
</div>
<div id="mensaje2" class="mensaje" title="Aviso">
    <p>Debe Seleccionar una fila para continuar</p>
</div>