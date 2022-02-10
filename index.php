<?php 

    session_start();
    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

?>
    <main>

        <h1 id="titre-presentation">Bienvenue</h1>

        <div class="containerA">

            <div class="containerA1">

                <h2><?php echo $article[0]; ?></h2>

                <p>
                    <?php echo $article[1]; ?>
                </p>

            </div>

            <div class="containerA2">

                <h2>Titre Article 2</h2>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, omnis sapiente! Voluptates, incidunt quisquam. Culpa officia accusantium laudantium labore, adipisci sint excepturi blanditiis aut quas mollitia id porro, cumque nostrum!</p>

            </div>

            <div class="containerA3">

                <h2>Titre Article 3</h2>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati minus error dignissimos impedit dolorem animi illum. Provident esse obcaecati unde delectus et id, rerum expedita impedit incidunt necessitatibus earum maiores.</p>

            </div>

        </div>

    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>