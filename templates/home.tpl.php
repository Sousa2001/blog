<style>
        .posts{
            text-align: center;
        }
        table {
            margin-top: 30px;
            width:100%;
            display: flex;
            justify-content:center; 
            align-items:center;
            text-align:center;
            margin-bottom: 50px; 
        }
        td, th {
            border: black 2px solid;
        }
        #oculto{
            opacity:0;
            width : 1px;
            height : 1px;
        }

    </style>

<?php

    include 'templates/header.tpl.php';

    ?>

    <main><h1><?= $title; ?></h1>

        <?php 
            $post_data=$this->data();
            foreach ($post_data as $valor){
                print "<div class='posts'> <h4>" . $valor['title'] . "</h4>";
                print "<p>" . $valor['cont'] . "</p>";
                print "<p>" . $valor['createdate'] . ", ". $valor['user']."</p>";
                print "<hr>";
                print "<p>Comentarios:</p><br>";
                print "
                <form method='POST' action='user/addcomment'>
                    <input id='oculto' type='text' value=' ". $valor['id']. "' readonly  name='post_id'>
                    <input type='text' name='addcomment'>";
                print "<input type='submit' value='Comentar'></form>";
                $comment_data=$this->comment();
                foreach ($comment_data as $valcom){ 
                    if($valcom['post']==$valor['id']){
                    print "<p>" . $valcom['comment'] . ", ". $valcom['user']."</p>";
                    }
                }
                print "<hr></div>";
            }
        ///id/". $valor['id']."
        ?>


    </main>

<?php
    include 'templates/footer.tpl.php';
    ?>

