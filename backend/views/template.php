<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>ecommerce</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="views/images/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

    <!-- STYLESHEETS -->
    <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
    </style>
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="views/css/main.css">
    <link type="text/css" rel="stylesheet" href="views/css/styles.css">
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="views/css/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="views/node_modules/animate.css/animate.min.css">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="views/node_modules/pnotify/dist/PNotifyBrightTheme.css">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="views/node_modules/nvd3/build/nv.d3.min.css" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="views/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="views/fuse-html/fuse-html.min.css" />
    <link rel="stylesheet" type="text/css" href="views/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/alertify.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="views/css/slides.css">
    
    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="views/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="views/node_modules/mobile-detect/mobile-detect.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="views/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="views/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="views/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="views/node_modules/d3/d3.min.js"></script>
    <script type="text/javascript" src="views/node_modules/nvd3/build/nv.d3.min.js"></script>
    <!-- Data tables -->
    <script type="text/javascript" src="views/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="views/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotify.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyStyleMaterial.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyButtons.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyCallbacks.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyMobile.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyHistory.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyDesktop.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyConfirm.js"></script>
    <script type="text/javascript" src="views/node_modules/pnotify/dist/iife/PNotifyReference.js"></script>

    <!-- Fuse Html -->
    <script type="text/javascript" src="views/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="views/js/main.js"></script>

    
    <!-- / JAVASCRIPT -->
</head>
<body class="layout layout-vertical layout-left-navigation layout-above-toolbar layout-above-footer">
    

	<?php 
        $modulos = new Enlaces();
        $modulos -> enlacesController();
    ?>

    <script src="views/js/color.picker.js"></script>

	<!-- SCRIPTS -->
    <script src="views/js/jquery-ui.js"></script>
    <script src="views/js/sweetalert2.min.js"></script>
    <script src="plugins/tinymce/tinymce.min.js"></script>
    <script src="views/js/alertify.js"></script>
    <script src="views/js/ajax.js"></script>
    <script src="views/js/util.js"></script>
    <script src="views/js/gestorUsuario.js"></script>
    <script src="views/js/gestorProducto.js"></script>
    <script src="views/js/gestorCategoria.js"></script>
    <script src="views/js/gestorMenu.js"></script>
    <script src="views/js/gestorArticulos.js"></script>
    <script src="views/js/gestorPromociones.js"></script>
    <script src="views/js/gestorSlide.js"></script>
    <script src="views/js/gestorConfig.js"></script>
    <script src="views/js/gestorPages.js"></script>

    <script>

        //funciones jesus

        $(document).ready(function() {

            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce",
                    theme: "modern",
                    height: 300,
                    valid_elements : '*[*]',
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });

            }
            if ($(".mymce").length > 0) {
                tinymce.init({
                    selector: "textarea.mymce",
                    theme: "modern",
                    height: 300,
                    valid_elements : '*[*]',
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });

            }
        });
    



        //funciones luis
        function saveNewPosition(){
            var positions = [];

            $(".updated").each(function(){
                positions.push([$(this).attr('data-index'), $(this).attr('data-position')])
                $(this).removeClass('updated');

                OptionsAjax.data = {
                    update: 1,
                    positions: positions
                };
                OptionsAjax.url = "views/ajax/gestorCategorias.php";
                ajax.setData(OptionsAjax);
                ajax.ejecutar() 
                .then((data)=>{
                    console.log(data);
                    console.log("hola");
                    if (data=="ok") {
                        // alertify.success('Posicion actualizada!');
                        util.alertSuccess("Posicion actualizada!")
                        
                    }

                },(fail)=>{
                    console.log("fallo");
                    console.log(fail);
                })
            })
        }


        $(document).ready(function() {
            $( "#category-table tbody" ).sortable({
            update: function(event, ui){
                $(this).children().each(function(index){
                    $(".script-tag").each(function(){
                        $(this).remove()
                    })
                    if ($(this).attr('data-position') != (index+1)) {
                        $(this).attr('data-position', (index+1)).addClass('updated')
                    }
                })

                saveNewPosition();
            }
            });

        });
    </script>

    <script src="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

</body>
</html>
