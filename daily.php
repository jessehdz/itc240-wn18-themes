<?php include 'includes/config.php'?>
<?php 
//daily logic goes here:

if (isset($_GET['day'])){
    //data in querystring, use it
    $day = $_GET['day'];
} else {
    //use current date
    $day = date('l');
}     
    
$day = date('l');


//switch to go through the days of the week and movies before 12pm
switch($day)
{
    case 'Monday':
        $widgetOTD = "Champagne Seas";
        $pic = "img/monday.png";
        $alt = "Don't miss out on this Champagne Seas today!";
    break;
        
    case 'Tuesday':
        $widgetOTD = "Damascus Steel Micro";
        $pic = "img/tuesday.png";
        $alt = "Don't miss out on this Damascus Steel Micro today!";
    break;
        
    case 'Wednesday':
        $widgetOTD = "Teal Buckeye";
        $pic = "img/wednesday.png";
        $alt = "Don't miss out on this Teal Buckeye today!";
    break;
        
    case 'Thursday':
        $widgetOTD = "Two 7” Nakiris";
        $pic = "img/thursday.png";
        $alt = "Don't miss out on these Two 7” Nakiris today!";
    break;
        
    case 'Friday':
        $widgetOTD = "Damascus EDC Tanto";
        $pic = "img/friday.png";
        $alt = "Don't miss out on this Damascus EDC Tanto today!";
    break;  
        
    case 'Saturday':
        $widgetOTD = "EDC Persian Tanto";
        $pic = "img/saturday.png";
        $alt = "Don't miss out on this EDC Persian Tanto today!";
    break;
     
    case 'Sunday':    
        $widgetOTD = "EDC Persian Tanto in Damascus Steel";
        $pic = "img/sunday.png";
        $alt = "Don't miss out on this EDC Persian Tanto in Damascus Steel today!";
    break;
}
    
?>    

<?php get_header()?>
<h2><?=$icon?></h2>
    
<p>Today is <strong><?=$day?></strong></p>
<img id="daily-pics" src="<?=$pic?>" alt="<?=$alt?>">
<p><em><?=$widgetOTD?></em></p>
<br />
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>


<?php get_footer()?>
