document.addEventListener('DOMContentLoaded', function() {
    const tabList = document.querySelector('.comn-nav-tabs .nav');
    tabList.addEventListener('shown.bs.tab', function(event) {
        let activeTab = event.target;
        if (activeTab) {
            activeTab.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
        }
    });
});


//----------------- Bootstrap Dropdown js code start here -----------------
$(document).ready(function() {
    $('.inner-dropdown-arrow').on('click', function(event) {
        event.stopPropagation(); // This stops the event from propagating to parent elements
    });

    function applyDropdownEvents() {
        $('.dropdown').on('show.bs.dropdown', function(event) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
        });
        $('.dropdown').on('hide.bs.dropdown', function(event) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp(150);
        });
    }

    function removeDropdownEvents() {
        $('.dropdown').off('show.bs.dropdown');
        $('.dropdown').off('hide.bs.dropdown');
    }

    function setupDropdowns() {
        if ($(window).width() <= 991) {
            applyDropdownEvents();
        } else {
            removeDropdownEvents();
        }
    }

    setupDropdowns();
    $(window).resize(setupDropdowns);
});


$(document).ready(function() {
    function enableDropdowns() {
        if ($(window).width() >= 992) {
            $('.navbar-nav').on('mouseenter', '.dropdown', function(event) {
                $(this).children('.dropdown-menu').stop(true, true).slideDown(300);
                $(this).addClass('show');
                $(this).children('.dropdown-menu').addClass('show');
            });

            $('.navbar-nav').on('mouseleave', '.dropdown', function(event) {
                var $dropdown = $(this);
                setTimeout(function() {
                    if (!$dropdown.is(':hover')) {
                        $dropdown.children('.dropdown-menu').stop(true, true).slideUp(150);
                        $dropdown.removeClass('show');
                        $dropdown.children('.dropdown-menu').removeClass('show');
                    }
                }, 150);
            });
        } else {
            $('.navbar-nav').off('mouseenter', '.dropdown');
            $('.navbar-nav').off('mouseleave', '.dropdown');
        }
    }
    enableDropdowns();
    $(window).resize(enableDropdowns);
});




//----------------- Bootstrap Dropdown js code end here -----------------