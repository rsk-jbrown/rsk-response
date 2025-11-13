
<?php
if (!is_404()) :
$heading = get_field('footer_heading', 'options');
$subheading = get_field('footer_subheading', 'options');
$copy = get_field('footer_copy', 'options');
$copy_small = get_field('footer_copy_small', 'options');
$email = get_field('email', 'options');
$form_id = get_field('footer_form_id', 'options');
$blue_bg = get_field('footer_blue_background', 'options');
$show_tweets = get_field('footer_show_tweets', 'options');
$form_heading = get_field('footer_form_heading', 'options');
$form_subheading = get_field('footer_form_subheading', 'options');

?>

<footer class="mastfoot divider divider--top <?php if ($blue_bg) : ?>mastfoot--blue-bg<?php endif; ?> <?php if ($show_tweets) : ?>mastfoot--tweets<?php endif; ?>">
    <div class="mastfoot__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 mastfoot__col">
                    <div class="mastfoot__text">
                        <?php if ($heading || $subheading) : ?>
                            <div class="headings">
                                <?php if ($heading) : ?>
                                    <?php if ($show_tweets) : ?>
                                        <h4 class="text-white"><?php echo $heading; ?></h4>
                                    <?php else : ?>
                                        <h2 class="text-white"><?php echo $heading; ?></h2>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($subheading) : ?>
                                    <h4 class="text-primary"><?php echo $subheading; ?></h4>
                                <?php else : ?>

                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($copy) : ?>
                            <div class="mastfoot__copy text-white <?php if ($copy_small) : ?>copy-small<?php else : ?>copy-large<?php endif; ?>">
                                <?php echo $copy; ?>
                            </div>
                        <?php endif; ?>
                        <?php get_template_part('lib/components/social'); ?>
                    </div>
                </div>
                <div class="col-xl-8 mastfoot__col mastfoot__col--form">
                    <div class="row">
                        <div class="<?php if (!$show_tweets) : ?>col-12<?php else : ?>col-xl-6<?php endif; ?>">
                            <div class="mastfoot__form">
                                <?php if ($form_heading || $form_subheading) : ?>
                                    <div class="headings">
                                        <?php if ($form_heading) : ?>
                                            <?php if ($show_tweets) : ?>
                                                <h4 class="text-white"><?php echo $form_heading; ?></h4>
                                            <?php else : ?>
                                                <h2 class="text-white"><?php echo $form_heading; ?></h2>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($form_subheading) : ?>
                                            <h4 class="text-primary"><?php echo $form_subheading; ?></h4>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($form_id) : ?>
                                    <?php gravity_form($form_id, false, false, false, null, true, 35); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ($show_tweets) : ?>
                            <div class="col-xl-6">
                                <div class="mastfoot__tweets">
                                    <div class="headings">
                                        <h4 class="text-white"><?php _e('Latest Tweets!', 'kmg'); ?></h4>
                                    </div>
                                    <?php get_template_part('lib/components/tweets'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mastfoot__bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mastfoot__copyright">
                        <span><?php echo date('Y'); ?> &copy; <?php the_field('copyright_text', 'options'); ?></span>
                    </div>
                </div>
                <div class="col-md-8">
                    <nav class="mastfoot__nav">
                        <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false)); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer><!-- .mastfoot -->
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function () {

    if (!getCookie('rskc-all') || getCookie('rskc-all') === 'on' || getCookie('rskc-videos') === 'on') {

        function handleLazyLoad(iframe) {
            //if (iframe.classList.contains('lazyload')) {

            var storeSRC = iframe.dataset.src;
            iframe.addEventListener('lazyloaded', function () {
                delete iframe.dataset.src;
                iframe.src = storeSRC;

                initPlayer(iframe);
            });
            //}
        }

        function initPlayer(iframe) {
            var player = new Vimeo.Player(iframe);
            player.ready().then(function () {
                // console.log('player is ready!');

                playPauseVideo($('.video_slider'), "play");

                setTimeout(function () {
                    // Now these events attach as I would like them to ?
                    player.on('play', function () {
                        // console.log('played the video!');
                    });

                    player.on('ended', function () {
                        // console.log('the video has ended');
                    });
                }, 1000);
            });
        }

        $('.video_slide').each(function (index, elem) {

            handleLazyLoad($(elem).find('iframe').get(0));

        });

        // $('.video_slider').on("init", function (slick) {
        //     slick = $(slick.currentTarget);
        //     setTimeout(function () {
        //
        //     }, 500);
        //
        // });

        slideWrapper.on("beforeChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "pause");
        });
        slideWrapper.on("afterChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "play");
        });

    }

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name + "= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";

    }

    function clearCookie(name, domain, path) {

        try {
            function Get_Cookie(check_name) {
                // first we'll split this cookie up into name/value pairs
                // note: document.cookie only returns name=value, not the other components
                var a_all_cookies = document.cookie.split(';'),
                    a_temp_cookie = '',
                    cookie_name = '',
                    cookie_value = '',
                    b_cookie_found = false;

                for (i = 0; i < a_all_cookies.length; i++) {
                    // now we'll split apart each name=value pair
                    a_temp_cookie = a_all_cookies[i].split('=');

                    // and trim left/right whitespace while we're at it
                    cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

                    // if the extracted name matches passed check_name
                    if (cookie_name == check_name) {
                        b_cookie_found = true;

                        // we need to handle case where cookie has no value but exists (no = sign, that is):
                        if (a_temp_cookie.length > 1) {
                            cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
                        }
                        // note that in cases where cookie is initialized but no value, null is returned
                        return cookie_value;
                        break;
                    }
                    a_temp_cookie = null;
                    cookie_name = '';
                }
                if (!b_cookie_found) {
                    return null;
                }
            }

            if (Get_Cookie(name)) {
                var domain = domain || document.domain;
                var path = path || "/";
                document.cookie = name + "=; expires=" + new Date + "; domain=" + domain + "; path=" + path;
            }
        } catch (err) {
            console.log(err);
        }
    };

    var firstTLDs = "ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|be|bf|bg|bh|bi|bj|bm|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|cl|cm|cn|co|cr|cu|cv|cw|cx|cz|de|dj|dk|dm|do|dz|ec|ee|eg|es|et|eu|fi|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|im|in|io|iq|ir|is|it|je|jo|jp|kg|ki|km|kn|kp|kr|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|na|nc|ne|nf|ng|nl|no|nr|nu|nz|om|pa|pe|pf|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sx|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|yt".split('|');
    var secondTLDs = "com|edu|gov|net|mil|org|nom|sch|caa|res|off|gob|int|tur|ip6|uri|urn|asn|act|nsw|qld|tas|vic|pro|biz|adm|adv|agr|arq|art|ato|bio|bmd|cim|cng|cnt|ecn|eco|emp|eng|esp|etc|eti|far|fnd|fot|fst|g12|ggf|imb|ind|inf|jor|jus|leg|lel|mat|med|mus|not|ntr|odo|ppg|psc|psi|qsl|rec|slg|srv|teo|tmp|trd|vet|zlg|web|ltd|sld|pol|fin|k12|lib|pri|aip|fie|eun|sci|prd|cci|pvt|mod|idv|rel|sex|gen|nic|abr|bas|cal|cam|emr|fvg|laz|lig|lom|mar|mol|pmn|pug|sar|sic|taa|tos|umb|vao|vda|ven|mie|北海道|和歌山|神奈川|鹿児島|ass|rep|tra|per|ngo|soc|grp|plc|its|air|and|bus|can|ddr|jfk|mad|nrw|nyc|ski|spy|tcm|ulm|usa|war|fhs|vgs|dep|eid|fet|fla|flå|gol|hof|hol|sel|vik|cri|iwi|ing|abo|fam|gok|gon|gop|gos|aid|atm|gsm|sos|elk|waw|est|aca|bar|cpa|jur|law|sec|plo|www|bir|cbg|jar|khv|msk|nov|nsk|ptz|rnd|spb|stv|tom|tsk|udm|vrn|cmw|kms|nkz|snz|pub|fhv|red|ens|nat|rns|rnu|bbs|tel|bel|kep|nhs|dni|fed|isa|nsn|gub|e12|tec|орг|обр|упр|alt|nis|jpn|mex|ath|iki|nid|gda|inc".split('|');

    var removeSubdomain = function (s) {
        s = s.replace(/^www\./, '');

        var parts = s.split('.');

        while (parts.length > 3) {
            parts.shift();
        }

        if (parts.length === 3 && ((parts[1].length > 2 && parts[2].length > 2) || (secondTLDs.indexOf(parts[1]) === -1) && firstTLDs.indexOf(parts[2]) === -1)) {
            parts.shift();
        }

        return parts.join('.');
    };

    $('#cookieSettingsForm').on('submit', function (e) {
        e.preventDefault();

        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {

            clearCookie(cookies[i].split("=")[0].trim(), removeSubdomain(window.location.hostname), '/');
            clearCookie(cookies[i].split("=")[0].trim(), window.location.hostname, '/');
            clearCookie(cookies[i].split("=")[0].trim(), '', '/');
        }

        var allOn = true;

        $.each($('#cookieSettingsForm').serializeArray(), function () {
            setCookie('rskc-' + this.name, this.value, 365);

            if (this.value === 'off') {
                eraseCookie('rskc-all');
                setCookie('rskc-all', 'off', 365);
                allOn = false;
            }
        });

        if (allOn) {
            setCookie('rskc-all', 'on', 365);
        }

        setTimeout(function () {
            $('.cookie-settings__form-saved').remove();
            $('#cookieSettingsForm').find('.cookie-settings__form-footer').append('<p class="cookie-settings__form-saved">Settings Saved</p>')
        }, 300);
    });


    $('#cookieConf').on('click', function (e) {
        e.preventDefault();

        setCookie('rskc-all', 'on', 365);

        $('.cookie-banner').fadeOut();
    });


});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field('google_maps_api_key', 'options'); ?>"></script>
<?php wp_footer(); ?>

</body>
</html>
