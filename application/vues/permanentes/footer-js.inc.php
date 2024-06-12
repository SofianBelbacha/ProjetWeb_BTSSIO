    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo Chemins::LIBS .'jquery-nice-select-1.1.0/js/jquery.nice-select.min.js'; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo Chemins::LIBS .'sticky-js-master/dist/sticky.min.js'; ?>"></script>
    <script src="../public/js/jquery.sticky.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo Chemins::JS .'owl.carousel.min.js'; ?>"></script>
    <script>
    </script>
    <script>
        $("#search_input_box").hide();
        $("#search").on("click", function () {
            $("#search_input_box").slideToggle();
            $("#search_input").focus();
        });
        $("#close_search").on("click", function () {
            $('#search_input_box').slideUp(500);
        });

        $('.collapse').on('shown.bs.collapse', function () {
            $(this).parent().find(".lnr-arrow-right").removeClass("lnr-arrow-right").addClass("lnr-arrow-left");
        }).on('hidden.bs.collapse', function () {
            $(this).parent().find(".lnr-arrow-left").removeClass("lnr-arrow-left").addClass("lnr-arrow-right");
        });
    </script>
    <script></script>
    <script>
        $(document).ready(function () {
            let valeurAvantClique =  $('input[type="radio"]').checked ;
            $("#search_input_box").hide();

            var scrollThreshold = 25; // Par exemple, ajoutez la classe après 100 pixels de défilement
            // Fonction pour gérer le défilement
            function handleScroll() {
                var scrollPosition = $(window).scrollTop();

                // Vérifiez si la position de défilement dépasse le seuil
                if (scrollPosition > scrollThreshold) {
                    $("#undefined-sticky-wrapper").addClass("is-sticky");
                    $(".header_area").css({
                        "width": "100%",
                        "position": "fixed",
                        "top": "0px"
                    });
                } else {
                    $("#undefined-sticky-wrapper").removeClass("is-sticky");
                    $(".header_area").css({
                        "width": "",
                        "position": "",
                        "top": ""
                    });

                }
            }

            // Ajoutez un gestionnaire d'événements de défilement
            $(window).scroll(handleScroll);
            // Appelez la fonction pour gérer le défilement lorsque la page se charge
            handleScroll();
            
        });
    </script>
        <script>
</script>
        </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var toggleButton = document.getElementById("toggleButton");
            var menu = document.getElementById("navbarSupportedContent");
            var container = document.getElementById("containenav");
            var originalContainerHeight = container.clientHeight + "px"; // Stockez la hauteur initiale du conteneur
            toggleButton.addEventListener("click", function () {
                if (menu.style.display === "block") {
                    menu.style.display = "none";
                    container.style.minHeight = originalContainerHeight; // Rétablissez la hauteur initiale du conteneur

                } else {
                    menu.style.display = "block";
                    container.style.height = "auto";
                }
            });
        });
    </script>   
    <script>
        $(".sticky-header").sticky();
    </script>
    <script>
        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock() {
                var t = getTimeRemaining(endtime);

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + 30 * 24 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>
    <script>
        $('.navbar-nav li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });

    </script>
    <script>
        // Supprimer la classe "active" et "show" des onglets au chargement de la page
        document.getElementById('home').classList.add('active', 'show');           
        document.getElementById('home').classList.remove('tab-pane');
        document.getElementById('profile').classList.remove('active', 'show');

        // Écouter les clics sur les onglets
        document.getElementById('home-tab').addEventListener('click', function () {
            document.getElementById('home').classList.add('active', 'show');
            document.getElementById('home').classList.remove('tab-pane');
            document.getElementById('profile').classList.add('tab-pane');
            document.getElementById('profile').classList.remove('active', 'show');
        });

        document.getElementById('profile-tab').addEventListener('click', function () {
            document.getElementById('home').classList.remove('active', 'show');
            document.getElementById('home').classList.add('tab-pane');
            document.getElementById('profile').classList.add('active', 'show');
            document.getElementById('profile').classList.remove('tab-pane');
        });
    </script>
    <script>
        // Attachez un gestionnaire d'événements click à toutes les div avec la classe "owl-dot"
        $('.owl-dot').click(function() {
            // Supprimez la classe "active" de toutes les div avec la classe "owl-dot"
            $('.owl-dot').removeClass('active');
            
            // Ajoutez la classe "active" à la div actuellement cliquée
            $(this).addClass('active');
        });
    </script>    
    <script>
        var owl = $(".s_Product_carousel").owlCarousel({
            items: 1,
            autoplay: false,
            autoplayTimeout: 5000,
            loop: true,
            nav: false,
            dots: true,
            onInitialized: initDots // Appeler la fonction initDots lors de l'initialisation
        });

        // Fonction pour initialiser les points de pagination
        function initDots(event) {
            var dots = $('.owl-dot');

            dots.click(function () {
                var dot = $(this);
                var dotIndex = dot.index();
                owl.trigger('to.owl.carousel', [dotIndex, 300]); // Déplacer le carrousel à l'élément correspondant au point cliqué
            });
        }
    </script>
    <script type="text/javascript" src="<?php echo Chemins::JS .'owl.carousel.min.js'; ?>"></script>
    <script>
        $(".active-exclusive-product-slider").owlCarousel({
            items: 1,
            autoplay: false,
            autoplayTimeout: 5000,
            loop: true,
            nav: true,
            navText: ["<img src='public/image/fleche-gauche.png'>", "<img src='public/image/fleche-droite.png'>"],
            dots: false
        });
    </script>
    
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    
    radioButtons.forEach(radioButton => {
      radioButton.addEventListener('onclick', () => {
        if (radioButton.checked) {
          radioButton.checked = false;
        } else {
          radioButton.checked = true;
        }
      });
    });
  });
</script>


