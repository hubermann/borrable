<ul class="sidebar-menu">
<?php  





######## eventos
if($this->uri->segment(2)=="eventos" || $this->uri->segment(2)=="categorias_eventos" ){
	echo '
<!-- links eventos -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>eventos</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/eventos').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
<li><a href="'.base_url('control/eventos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nuevo</a></li>

<li><a href="'.base_url('control/categorias_eventos').'"><i class="fa fa-angle-double-right"></i> Ver categorias</a></li>
<li><a href="'.base_url('control/categorias_eventos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva categoria</a></li>
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






######## notas
if($this->uri->segment(2)=="notas" || $this->uri->segment(2)=="categorias_notas"){
	echo '
	<!-- links notas -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>notas</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/notas').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
<li><a href="'.base_url('control/notas/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
<li><a href="'.base_url('control/categorias_notas').'"><i class="fa fa-angle-double-right"></i> Ver Categorias</a></li>
<li><a href="'.base_url('control/categorias_notas/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva Categoria</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/notas').'">
            <i class="fa fa-dashboard"></i> <span>Notas</span>
        </a>
    </li>
	';
}


######## usuarios
if($this->uri->segment(2)=="usuarios"){
	echo '
	<!-- links usuarios -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>usuarios</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/usuarios').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
<li><a href="'.base_url('control/usuarios/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/usuarios').'">
            <i class="fa fa-dashboard"></i> <span>usuarios</span>
        </a>
    </li>
	';
}

######## roles
if($this->uri->segment(2)=="roles"){
	echo '
	<!-- links roles -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>roles</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/roles').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
<li><a href="'.base_url('control/roles/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/roles').'">
            <i class="fa fa-dashboard"></i> <span>roles</span>
        </a>
    </li>
	';
}

######## permisos
if($this->uri->segment(2)=="permisos"){
	echo '
	<!-- links permisos -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>permisos</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/permisos').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
<li><a href="'.base_url('control/permisos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/permisos').'">
            <i class="fa fa-dashboard"></i> <span>permisos</span>
        </a>
    </li>
	';
}

?>

<li class="treeview">
<a href="#">
<i class="fa fa-sign-out"></i>
<span>Finalizar</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="<?php echo base_url('control/logout'); ?>"><i class="fa fa-angle-double-right"></i> Cerrar sesion </a></li>
</ul> 
</li>
    
</ul>
