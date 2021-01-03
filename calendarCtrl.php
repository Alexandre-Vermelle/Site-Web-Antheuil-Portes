<?php
$firstYear = 2021;
$lastYear = 2050;
$monthList = array(
    '01' => 'Janvier',
    '02' => 'Février',
    '03' =>  'Mars',
    '04' =>  'Avril',
    '05' =>  'Mai',
    '06' =>  'Juin',
    '07' =>  'Juillet',
    '08' =>  'Août',
    '09' =>  'Septembre',
    '10' =>  'Octobre',
    '11' =>  'Novembre',
    '12' =>  'Décembre'
);
    $formError = array();
    if(isset($_POST['showCalendar'])){
        //Vérification de la liste déroulante du mois
        if(!empty($_POST['month']))
        {
            if($_POST['month'] >= 1 && $_POST['month'] <= 12){
                $month = $_POST['month'];
            }else {
                $formError['month'] = 'Le mois transmis est incorrect';
            }
        }else {
            $formError['month'] = 'Veuillez choisir un mois';
        }
    //Vérification de la liste déroulante de l'année
    if (!empty($_POST['year'])) {
        if ($_POST['year'] >= $firstYear && $_POST['year'] <= $lastYear) {
            $month = $_POST['year'];
        } else {
            $formError['year'] = 'L\'année transmise est incorrecte';
        }
    } else {
        $formError['year'] = 'Veuillez choisir une année';
    }
    //SI je n'ai pas d'erreurs je fais les calculs nécessaires à l'affichage du tableau
    if(count($formError) == 0){
        $firstDayOfMonth = date('N', mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']));
        $daysNumberOfMonth = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
    }
    }
