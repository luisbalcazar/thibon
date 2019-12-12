
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

                    <div id="maintenance" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <div class="logo bg-secondary">
                                <span>F</span>
                            </div>

                            <div class="title mt-4">Closed for scheduled maintenance!</div>

                            <div class="subtitle mt-4 mb-4 mx-auto text-muted">
                                We're sorry for the inconvenience.
                                <br> Please check back later.
                            </div>

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