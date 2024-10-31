<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div id="fondo">
<div id="bloquepi1" style="font-size:16px">
<?php
$doctorIMC=get_option('doctor_RBMIC');
if($doctorIMC==1):?>
<div id="doctor"> <img style="max-width:50%;float:left;margin-right:10px" src="<?php echo RBMIC_URL ?>images/minidoctor.jpg" alt="doctor con carpeta"></div>
<?php
endif;
?>
<p><?php echo esc_html(__("Your body mass index is","Responsive-BMI-Calculator"))?>:<span style="font-size:20px"><b> <?php

$unit=sanitize_text_field($_POST["unit"]);
$peso=sanitize_text_field($_POST["imc-peso"]);
if($unit=="libras") $peso=$peso*0.453592;
$imcEstatura=sanitize_text_field($_POST["imc-estatura"]);
$estaturacuadrado=$imcEstatura*$imcEstatura;
$imc=$peso/$estaturacuadrado;

echo round ($imc*100)/100;


$limiteinf=round ($estaturacuadrado*185)/10;
$limitesup=round ($estaturacuadrado*249.9)/10;
$limitesupg=round ($estaturacuadrado*300)/10;

if($unit=="libras") {
  $limiteinf=round($limiteinf/0.045359237)/10;
  $limitesup=round($limitesup/0.045359237)/10;
  $limitesupg=round($limitesupg/0.045359237)/10;};
  
$unitString=$unit;

if($unitString=="libras") $unitString=__("pounds","Responsive-BMI-Calculator"); 
?></b></span></p>
<p>
<?php
if ($imc<18.5) echo esc_html(__("You are underweight.","Responsive-BMI-Calculator")." ".__("Try to stay above","Responsive-BMI-Calculator")." ".$limiteinf." ".$unitString." ".__("to have a healthier weight.","Responsive-BMI-Calculator"));
if (($imc>=18.5) AND ($imc<25)) echo esc_html(__("You are in the optimal weight range according to the World Health Organization. Try to remain between","Responsive-BMI-Calculator")." ".$limiteinf." ".__("and")." ".$limitesup." ".$unitString." ".__("of body weight.","Responsive-BMI-Calculator"));
if (($imc>=25) AND ($imc<30)) echo esc_html(__("You are overweight (not obese). Try to stay below","Responsive-BMI-Calculator")." ".$limitesup." ".$unitString." ".__("to have a healthy weight.","Responsive-BMI-Calculator"));
if (($imc>=30.00) AND ($imc<35)) echo esc_html(__("You have obesity class 1 according to the data of the World Health Organization. You have a low risk of suffering from diseases associated with obesity. Try to stay below,","Responsive-BMI-Calculator")." ".$limitesupg." ".$unitString." ".__("of body weight to reduce the risk of suffering associated diseases. The healthiest thing would be if you stay below","Responsive-BMI-Calculator")." ".$limitesup." ".$unitString.".");
if (($imc>=35) AND ($imc<40)) echo esc_html(__("You have obesity class 2 according to the data of the World Health Organization. You have a moderate risk of suffering from diseases associated with obesity. Try to stay below","Responsive-BMI-Calculator")." ".$limitesupg." ".$unitString." ".__(" of body weight to reduce the risk of suffering associated diseases. The healthiest thing would be if you stay below","Responsive-BMI-Calculator")." ".$limitesup." ".$unitString.".");
if ($imc>=40) echo esc_html(__("You have obesity class 3 according to the data of the World Health Organization. You have a high risk of suffering diseases associated with obesity. Try to stay below","Responsive-BMI-Calculator")." ".$limitesupg." ".$unitString." ".__("of body weight to reduce the risk of suffering associated diseases. The healthiest thing would be if you stay below","Responsive-BMI-Calculator")." ".$limitesup." ".$unitString.".");
 ?></p>
 <div style="clear:both;margin-bottom:15px"></div>
