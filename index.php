<!--Series of exercises on PHP conditional structures.
// Consolidation Challenge: Fake Excuse Notes Generator. Exercise -->

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excuse Notes Generator</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
    <link rel="manifest" href="./assets/images/site.webmanifest">
</head>

<body>
    <header class="header">
        <div class="header_intro">  
            <span>
                <img src="./assets/images/favicon/favicon.ico" alt="image of a lutin" width="50px" height="50px">
                <h1>The Magic Elf, your excuse generator</h1>
            </span>
            <!-- <span> -->
                <h2>The Magic Elf will help you write a letter of apology for your child's absences, whatever the reason! No more vague letters </h2>  
                <img src="./assets/images/christmas-elf.png" alt="image of a lutin" width="100px" height="auto">
            <!-- </span> -->
        </div>
        <form method="get" action="">
            <div class="form">
                <label for="child-name">Child's name ? : </label>
                <input class="input_text" type="text" name="child-name">
            </div>
            <div class="form">
                <label for="child-gender">Child's gender, Girl or Boy ? : </label>
                <input class="input_text" type="text" name="child-gender">
            </div>
            <div class="form">
                <label for="teacher-name">Teacher's name ? : </label>
                <input class="input_text" type="text" name="teacher-name">
            </div>
            <div class="form">
                <label for="teacher-gender">Teacher's gender, Madam or Mister ? : </label>
                <input class="input_text" type="text" name="teacher-gender">
            </div>
            <div class="form">
                <label for="date">Date of the abscence ? : </label>
                <input type="date" name="date">
            </div>
            <div class="form form_radio">
                <input class="input_radio" type="radio" name="excuses" value="illness">
                <label for="illness"> Illness </label>
            </div>
            <div class="form form_radio">
                <input class="input_radio" type="radio" name="excuses" value="death">
                <label for="death"> Death of the pet (or a family member) </label>
            </div>
            <div class="form form_radio">
                <input class="input_radio" type="radio" name="excuses" value="activity">
                <label for="activity"> Significant extra-curricular activity </label>
            </div>
            <div class="form form_radio">
                <input class="input_radio" type="radio" name="excuses" value="other">
                <label for="other"> Other </label>
            </div>
            <input class="submit" type="submit" name="submit" value="Generate excuse">
        </form>
    </header>
    <?php

    if (isset($_GET['child-name'])) {
        // Form processing
        $child_name = $_GET['child-name'];
    }
    if (isset($_GET['child-gender'])) {
        // Form processing
        $child_gender = $_GET['child-gender'];
        $child_PRONOUN = ($child_gender == 'Girl') ? "she" : "he";
        $child_POSS_DETERMINER = ($child_gender == 'Girl') ? "her" : "his";
        $child_POSS_PRONOUN = ($child_gender == 'Girl') ? "her" : "him";
    }
    if (isset($_GET['teacher-name'])) {
        // Form processing
        $teacher_name = $_GET['teacher-name'];
    }
    if (isset($_GET['teacher-gender'])) {
        // Form processing
        $teacher_gender = $_GET['teacher-gender'];
    }
    if (isset($_GET['date'])) {
        // Form processing
        $date = $_GET['date'];
        $formatedDate = date("l, jS F Y", strtotime($date));
    }
    if (isset($_GET['excuses'])) {
        // Form processing
        $excuses = $_GET['excuses'];
        switch ($excuses) {
            case 'illness':
                $excuses_note = "$child_name felt a sharp pain in $child_POSS_DETERMINER tooth, so $child_PRONOUN had to go to the dentist at once. Fortunately, there's no big trouble with it. Enclosed is the medical certificate issued by our dentist.";
                // $e1 = "$child_name went to the cafeteria to get something for breakfast, a tuna sandwich, and it made $child_POSS_PRONOUN sick immediately. So $child_PRONOUN had the runs, and needed to stay in the restroom all morning. As soon as $child_POSS_DETERMINER health improves, $child_name'll be back in the classroom. Enclosed is the medical certificate issued by our general practitioner.";
                // $e1 - 2;
                // $child_name wasn't feeling well this morning, we don't know if $child_PRONOUN'll be absent for several days, but I'll be sure to let you know, as soon as the doctor has made a medical diagnosis.
                break;
            case 'death':
                $excuses_note = "We have learned of the death of a member of our family. The funeral will take place on $formatedDate, and will unfortunately be unable to attend class.";
                // Our $child_gender will be absent from school for family and personal reasons. If you would like to know more about the reason for this absence, please contact me on my cell phone.
                // Our boy is very sad about the death of his pet rabbit Choupi, so unfortunately he won't be able to attend the class.
                break;
            case 'activity':
                $excuses_note = "Our $child_gender is due to take part in a sports competition on $formatedDate, and will unfortunately be unable to attend class.";
                break;
            case 'other':
                $excuses_note = "$child_name were auditioning to be in a TV commercial, and will unfortunately be unable to attend class.";
                // $e3 = "We’re heading on a family vacation so $child_PRONOUN has to miss school for a week, and will unfortunately be unable to attend class.";
                break;

            default:
                echo "ok ERROR";
                break;
        }
    }
    ?>

    <main>
        <p>
            <?php echo "$teacher_gender ";
            echo $teacher_name; ?>,
        </p>
        <p>
            The student, <?php echo $child_name; ?>, enrolled in your school in 6th grade is authorized by his parents not to attend school classes on the day of <?php
                                                                                                                                                                    echo $formatedDate; ?>. <?php
                                                                                                                                                                    echo $excuses_note; ?>
            
        <p>
            Thanking you in advance for your understanding, please accept our best regards.</p>
        </p>
        <? php ?>
    </main>

</body>

</html>