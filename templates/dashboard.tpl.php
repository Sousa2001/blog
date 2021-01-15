<style>
        .masterbox{
            width:100%;
            display: flex;

        }
        .creapost{
            border: black 2px solid;
            display: flex;
            justify-content:center; 
            width:20%;
            padding-top:2%;
            margin: 2%;
            }
        #creatitle{
            color: red;
        }

    </style>


<?php
    include 'templates/header.tpl.php';
    ?>
    
    <main><h1><?= $title; ?></h1>
    <br>
    <div class="masterbox">
    <div class="creapost">
        <form method="POST" action="dashaction">
        <h4 id="creatitle">Crear Post</h4><br/>
            <h5>Title</h5>
            <input type="text" name="title">
            <h5>Description</h5>
            <input type="text" name="descripcion"><hr>
            <input type="submit" value="Añadir Post">
        </form>
    </div>
    <div class="creapost">
        <form method="POST" action="deldashaction">
            <h4 id="creatitle">Borrar Post</h4><br/>
            <h5>Title</h5>
            <input type="text" name="title_post">
            <h5>Date del Post</h5>
            <input type="date" name="date_post"><hr>
            <input type="submit" value="Eliminar">
        </form>
    </div>

        <div class="creapost">
        <form method="POST" action="modytitledashaction">
            <h4 id="creatitle">Modificar Titulo Post</h4><br/>
            <h5>Antiguo Title</h5>
            <input type="text" name="titleold_post">
            <h5>Nuevo Title</h5>
            <input type="text" name="title_post">
            <h5>Date del Post</h5>
            <input type="date" name="date_post"><hr>
            <input type="submit" value="Actualizar">
        </form>
        </div>
        <div class="creapost">
        <form method="POST" action="modycontdashaction">
            <h4 id="creatitle">Modificar Post</h4><br/>
            <h5>Title</h5>
            <input type="text" name="title_post">
            <h5>Nuevo Contenido</h5>
            <input type="text" name="cont_post">
            <h5>Date del Post</h5>
            <input type="date" name="date_post"><hr>
            <input type="submit" value="Actualizar">
        </form>
        </div>
    </div>
</main>


<?php
    include 'templates/footer.tpl.php';
    ?>