<?php
get_header();
?>
<?php get_template_part('inc/parts/navs/nav', '1'); ?>



<section class="container form-reg-section">

    <form action="<?php echo get_site_url() . '/registrationdone'; ?>" method="POST" enctype="multipart/form-data">
        <div>
            <h4>الإسم بالكامل | FULL NAME*</h4>
            <span>
                <label>*الاسم الاول</label>
                <input class="form-control" type=" text" placeholder="First Name" name="firstName" required>
            </span>
            <span>
                <label>*اسم الاب</label>
                <input class="form-control" type="text" placeholder="Father name" name="fatherName" required>
            </span>
            <span>
                <label>*اسم العائلة</label>
                <input class="form-control" type="text" placeholder="Family name" name="familyName" required>
            </span>
        </div>
        <hr>
        <div>
            <h4>إسم الأم | MOTHER NAME*</h4>
            <input class="form-control" type="text" placeholder="Mother name" name="motherName" required>
        </div>
        <div>
            <h4>الجنسية | NATIONALITY*</h4>
            <select class="form-control" name="nationality" required>
                <option value="">Choose your nationality</option>
                <?php foreach ($countries as $country) {
                    echo '<option value="' . $country . '">' . $country . '</option>';
                } ?>
            </select>
        </div>
        <div>
            <h4>بلد الإقامة | COUNTRY OF RESIDENCE*</h4>
            <select class="form-control" name="residence" required>
                <option value="">Where do you live</option>
                <?php foreach ($countries as $country) {
                    echo '<option value="' . $country . '">' . $country . '</option>';
                } ?>
            </select>
        </div>
        <div>
            <h4>البريد الإلكتروني | EMAIL ADDRESS*</h4>
            <input class="form-control" type="email" placeholder="Email" name="email" required>
        </div>
        <div>
            <h4>رقم الجوال | PHONE NUMBER*</h4>
            <input class="form-control" type="tel" placeholder="Phone" name="phone" required>
        </div>

        <div>
            <h4>الدرجة العلمية | DEGREE*</h4>
            <select class="form-control" name="degree" required>
                <option value="">Select the required degree</option>
                <option value="Undergraduate">Undergraduate</option>
                <option value="Masters">Masters</option>
                <option value="PhD">PhD</option>
            </select>
        </div>
        <div>
            <h4>بلد الدراسة | STUDY COUNTRY*</h4>
            <select class="form-control" name="studyCountrt" required>
                <option value="">Choose the university you would like to study at</option>
                <option value="turkey">تركيا Turkey</option>
                <option value="Kazakhstan">كازاخستان Kazakhstan</option>
                <option value="Spain">أسبانيا Spain</option>
                <option value="Georgia">جورجيا Georgia"</option>
            </select>
        </div>
        <div>
            <h4>التخصص/البرنامج | DEPARTMENT/PROGRAM*</h4>
            <input class="form-control" type="text" placeholder="Write the department or program in English" name="department" required>
        </div>
        <div>
            <h4>لغة الدراسة | LANGUAGE OF STUDY*</h4>
            <select class="form-control" name="language" required>
                <option value="">Choose the language of study</option>
                <option value="EN">English</option>
                <option value="TDK">Turkish</option>
            </select>
        </div>
        <div>
            <h4>ملاحظات إضافية | NOTE</h4>
            <textarea class="form-control" name="note" id="" cols="30" rows="10" placeholder="You can write your note here"></textarea>
        </div>
        <div>
            <h4>الصورة الشخصية | BIOMETRIC PHOTO*</h4>
            <input class="form-control" type="file" name="biometric-photo" required>
        </div>
        <div>
            <h4>جواز السفر | PASSPORT*</h4>
            <input class="form-control" type="file" name="passport" required>
        </div>
        <div>
            <h4>ملفات/شهادات آخرى | OTHER DOCUMENTS OR CERTIFICATE</h4>
            <input class="form-control" type="file" name="other-documents">
        </div>
        <hr>
        <button class="form-control" type="submit">ارسال الطلب</button>

    </form>
</section>
<?php get_template_part('inc/parts/footers/footer', '1'); ?>

<?php
get_footer();
?>