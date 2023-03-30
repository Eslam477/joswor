<?php
$page_titel = 'Home';
get_header();
?>
<?php get_template_part('inc/parts/navs/nav', '1'); ?>

<section class="welcome-section">
    <div class="container-fluid text-center">
        <h1>
            Welcome to Joswor
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam tempora sit magni id exercitationem recusandae sunt ut repellat atque explicabo reiciendis velit, deserunt facere iusto, ratione a. Ad temporibus fuga possimus. Dolorem aperiam sint molestiae similique minus at ullam praesentium natus saepe debitis. Odio porro est at fugiat modi id.</p>
        <a href="<?php echo get_site_url() ?>/register/" class="btn btn-primary">
            Get Started
        </a>
    </div>
</section>
<section class="about_us_section">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-6">
                <h2>
                    من نحن
                </h2>
                <p>
                    مجموعة جسور الدولية هي مجموعة استشارية متكاملة الخدمات تركز على استشارات الأعمال والخدمات التعليمية والجامعية وخدمات رجال الأعمال على مدار سنين من التواجد المتميز في العديد من البلدان مثل تركيا، قبرص التركية، المملكة العربية السعودية، مصر. لأنّنا نؤمن إيماناً راسخاً بفضل العلم والتعلّم، ولأنّنا نستشرف مستقبلاً واعداً تلعب فيه الأجيال الصّاعدة دوراً رائداً في نهضة الأمّة على المستويات كافّة. حيث بدأت مسيرتنا منذ عام 2014 م وقد قامت الفكرة من أجل تحقيق حلم الطلاب الدوليين للإلتحاق بأفضل وأقوى الجامعات الدولية؛ ففريقنا من أصحاب الكفاءات العالية والأهم من ذلك هم أصحاب خبرة تصل إلى أكثر من 10 سنوات، ويتمتع مستشارونا بخبرة كافية في مجال الدراسة في الخارج، كما نوفر لهم تدريبًا داخليًا دوريًا من أجل ضبط معارفهم وإبقائهم على اطلاع بأحدث التغييرات. مجموعة جسور الدولية تقوم بتقديم خدمات متكاملة وموثوق بها وتسعى المجموعة إلى أن تكون على قائمة الشركات العالمية في مجال الاستثمار والخدمات التعليمية بشراكة استراتيجية نحو مستقبل مشرق. وهي أول مجموعة تضع في أولوياتها مساعدة الطلاب الأجانب بصفة عامة والطلاب العرب بصفة خاصة عبر تقديم تسهيلات أكاديمية وخصومات دراسية استثنائية للطلاب الراغبين بالدراسة في الخارج، ونسعى جاهدين لخلق الفرص لأولئك الذين لديهم طموح حقيقي ونوايا صادقة في تسهيل الرسوم الدراسية والخدمات الطلابية والمؤهلات والآفاق الوظيفية بعد التأهيل. وتمتلك جسور الدولية عدة فروع في الوطن العربي، كما أن لدينا شبكة واسعة من أكثر من 225 وكيل في كافة بلاد العالم.
                </p>
            </div>
            <div class="col-6">
                <span class="img" style="background-image: url('<?php echo get_theme_file_uri() ?>/assets/img/student-1.jpg');"></span>
            </div>
        </div>
    </div>
    <hr>
</section>

<section class="services_section">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <span class="img" style="background-image: url('<?php echo get_theme_file_uri() ?>/assets/img/student-1.jpg');"></span>
            </div>
            <div class="col-6 content">
                <h2>خدماتنا</h2>
                <ul>
                    <li>
                        <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>لدينا فريق عمل مختص لمتابعة الطالب
خطوة بخطوة في الاجراءات
واعداد له كافة … اقرأ المزيد</p>" data-bs-placement="left">
                            مساعدة الطالب في انهاء كافة إجراءات الإقامة*
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>نساعدك علي اختيار تخصصك المناسب من
خلال استشاريين مختصين حول كيفية اختيار
التخصص الجامعي ، واختيار … اقرأ المزيد</p>" data-bs-placement="left">
                            كيف تختار تخصصك ؟*
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>توفير خصومات جامعية تصل الي اكثر من
70 % من الرسوم الدراسية خصومات خاصة
لطلابنا عند التقديم … اقرأ المزيد</p>" data-bs-placement="left">
                            خصومات جامعية*
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>تقوم الشركة بتوفير العديد من الدورات
العلمية في كل المجالات العلمية المختلفة
و التي تساعد الطالب … اقرأ المزيد</p>" data-bs-placement="left">
                            توفير دورات علمية*
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>من اهم المستندات المطلوبة للاقامة هو
التأمين الصحي ، نوفر لجميع طلابنا
تأمين صحي شامل … اقرأ المزيد</p>" data-bs-placement="left">
                            استخراج التأمين الصحي*
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<p>هناك نوعان للسكن : سكن جامعي
وسكن خارجي متاح امام الطالب ان
يختار بينهمونحن نوفر … اقرأ المزيد</p>" data-bs-placement="left">
                            توفير سكن طلابي مناسب*
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="services_cards" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/student-2.jpg');">
    <!-- <h2>Our services</h2> -->
    <div class="container" style="position: relative;height: 100%;">
        <div class="row" style="  margin: 0;position: absolute;top: 50%;transform: translateY(-50%);">
            <div class="card col-3">
                <div class="card-body">
                    <span class="card-img-top"><i class="bi bi-pencil-fill"></i></span>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body">
                    <span class="card-img-top"><i class="bi bi-book-fill"></i></span>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body">
                    <span class="card-img-top"><i class="bi bi-award-fill"></i></span>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <p class="text-center m-5">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus quam id leo in vitae turpis massa sed. Sit amet cursus sit amet dictum. Vestibulum morbi blandit cursus risus Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus quam id leo in vitae turpis massa sed. Sit amet cursus sit amet dictum.Vestibulum morbi blandit cursus risus
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus quam id leo in vitae turpis massa sed. Sit amet cursus sit amet dictum. Vestibulum morbi blandit cursus risus Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus quam id leo in vitae turpis massa sed. Sit amet cursus sit amet dictum.Vestibulum morbi blandit cursus risus
    </p>
</section>

<section class="latest_articles">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            global $wpdb;
            $posts = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE (post_status = "publish" AND post_type = "post") LIMIT 5;');
            if (!empty($posts)) {
                $i = 0;
                foreach ($posts as $post) {
                    if ($i == 0) {
                        echo '
                        <div class="carousel-item active">
                            <div style="background-image:url(' . get_the_post_thumbnail_url($post->ID) . ')"></div>
                            <div class="post_data">
                            <h3>' . $post->post_title . '</h3>
                            <br>
                            <p>' . implode(' ', array_slice(explode(' ', $post->post_content), 0, 25)) . '...</p>
                        </div>
                            </div>
                    ';
                    } else {
                        echo '
                        <div class="carousel-item">
                            <div style="background-image:url(' . get_the_post_thumbnail_url($post->ID) . ')"></div>
                            <div class="post_data">
                            <h3>' . $post->post_title . '</h3>
                            <br>
                            <p>' . implode(' ', array_slice(explode(' ', $post->post_content), 0, 25)) . '...</p>
                        </div>
                            </div>
                    ';
                    }


                    $i++;
                }
            }
            ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>





</section>

<?php get_template_part('inc/parts/footers/footer', '1'); ?>
<?php
get_footer();
?>