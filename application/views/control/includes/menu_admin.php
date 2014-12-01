
<ul class="sidebar-menu">
<?php  
######## eventos
if($this->uri->segment(2)=="eventos"){
	echo '
<!-- links eventos -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>eventos</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/eventos').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
<li><a href="'.base_url('control/eventos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/eventos').'">
            <i class="fa fa-dashboard"></i> <span>Eventos</span>
        </a>
    </li>
	';
}
?>

<li class="treeview">
<a href="#">
<i class="fa fa-sign-out"></i></i>
<span>Finalizar</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<i class="<i class="fa fa-sign-out"></i>"></i>
<li><a href="<?php echo base_url('control/logout'); ?>"><i class="fa fa-angle-double-right"></i> Cerrar sesion </a></li>
</ul> 
</li>
    
  </ul>
  