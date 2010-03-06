<nav class="menu">
  <ul>
    <li class="current"><a href="#">Inicio</a></li>
    <li>
      <a href="#">Tramites</a>
      <ul>
        <li>
          <a href="#">Recientes</a>
          <ul>
            <li><a href="#">Sub Menu 1.1.1</a></li>
            <li><a href="#">Sub Menu 1.1.2</a></li>
            <li><a href="#">Sub Menu 1.1.3</a></li>
            <li><a href="#">Sub Menu 1.1.4</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Revisiones</a>
          <ul>
            <li><a href="#">Sub Menu 1.2.1</a></li>
          </ul>
        </li>
        <li><a href="#">Sub Menu 1.3</a></li>
        <li><a href="#">Sub Menu 1.4</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Configuración</a>
      <ul>
        <li>
          <a href="#"><?php echo __('Formularios'); ?></a>
          <ul>
            <li><?php echo link_to('Listado', 'formularios/index') ?></li>
            <li><?php echo link_to('Puntos de Visado', 'visados/index') ?></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</nav>