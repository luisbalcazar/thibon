
    <main>
        <?php 
            include "header.php"; 
        ?>
        <div id="wrapper">
            <?php 
                include "left-sidebar.php"; 
            ?>
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="error-404" class="d-flex flex-column align-items-center justify-content-center">

                        <div class="content">

                            <div class="error-code display-1 text-center">404</div>

                            <div class="message h4 text-center text-muted">Sorry but we couldn’t find the page you are looking for</div>

                            <div class="search md-elevation-1 row no-gutters align-items-center mt-12 mb-4 bg-white text-auto">
                                <i class="col-auto icon-magnify s-6 mx-4"></i>
                                <input class="col" type="text" placeholder="Search for anything">
                            </div>

                            <a class="back-link d-block text-center text-primary" href="/">Go back to dashboard</a>

                        </div>
                    </div>

                </div>
            </div>
            <?php 
              include "right-sidebar.php"; 
            ?>

        </div>
        <?php 
            include "footer.php"; 
          ?> 
    </main>
</body>

</html>