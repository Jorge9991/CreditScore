<nav class="navbar navbar-blue navbar-fixed-top" role="navigation" style="background: #428bca">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" style="color: white;" href="principal.php">ISTJBA | INVESTIGACIÓN</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right" style="margin-right:1%">
              <li><a class="navbar-nav" href="#"><span class="glyphicon glyphicon-user">   <?php echo $Sesion->getNombre() . ' ' . $Sesion->getApellido() ?></span> </a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>   
        </ul>
    </div>
</nav>
