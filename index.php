<head>

<script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>


</head>


<?

// in this area your need to fill all variables

$servername = 'localhost';
$username = 'userDBhere';
$password = 'userDBpasshere';
$schema = 'DBName';
$apiKey = 'yourBlizzardApiKey';
$realmName = 'YourRealmName';
$realmRegion = 'YourRealRegion';

$conn = new mysqli($servername, $username, $password, $schema); $conn->set_charset('utf8');
if ($conn->connect_error) { die('Connection failed: ' . $conn->connect_error); }


// in this part i'm making all SQL queries


$sql_herb1 = "SELECT MIN(buyout)/10000/200 as MIN FROM auctions where item=124105 and quantity=200"; //Starlight Rose cheapest price x200 stack
$result_herb1 = $conn->query($sql_herb1);

if ($result_herb1->num_rows > 0) {
    // output data of each row
    while($row = $result_herb1->fetch_assoc()) {

	 $Starlight_Rose=$row["MIN"];

    }
} else {
    echo "0 results";
}

$sql_herb2 = "SELECT MIN(buyout)/10000/200 as MIN FROM auctions where item=124104 and quantity=200"; //Fjarnskaggl cheapest price x200 stack
$result_herb2 = $conn->query($sql_herb2);

if ($result_herb2->num_rows > 0) {
    // output data of each row
    while($row = $result_herb2->fetch_assoc()) {

	 $Fjarnskaggl=$row["MIN"];

    }
} else {
    echo "0 results";
}


$sql_herb3 = "SELECT MIN(buyout)/10000/200 as MIN FROM auctions where item=124102 and quantity=200"; //Fjarnskaggl cheapest price x200 stack
$result_herb3 = $conn->query($sql_herb3);

if ($result_herb3->num_rows > 0) {
    // output data of each row
    while($row = $result_herb3->fetch_assoc()) {

	 $Dreamleaf=$row["MIN"];

    }
} else {
    echo "0 results";
}


$sql_flask1 = "SELECT owner, MIN(buyout)/10000 as MIN FROM auctions where item=127847 and quantity=1"; //Flask of the Wispered Pact cheapest price x1 stack
$result_flask1 = $conn->query($sql_flask1);

if ($result_flask1->num_rows > 0) {
    // output data of each row
    while($row = $result_flask1->fetch_assoc()) {

	 $Wispered_Pact=$row["MIN"];
         $Wispered_Last_Seller=$row["owner"];

    }
} else {
    echo "0 results";
}

$sql_flask2 = "SELECT sum(quantity) as SUM FROM auctions where item=127847 and quantity=1"; // Flask of the Wispered Pact show all x1 quantity
$result_flask2 = $conn->query($sql_flask2);

if ($result_flask2->num_rows > 0) {
    // output data of each row
    while($row = $result_flask2->fetch_assoc()) {

	 $Wispered_Pact_Q=$row["SUM"];


    }
} else {
    echo "0 results";
}



// Calculates here


$Wisper_Crafting_Cost=round((($Dreamleaf*10)+($Fjarnskaggl*10)+($Starlight_Rose)*7),2)/1.4802; 
$Wisper_Profit=($Wispered_Pact-$Wisper_Crafting_Cost)-($Wispered_Pact-$Wisper_Crafting_Cost)*0.05;


// closing connection to SQL 

$conn->close();
mysqli_close($conn);


// let's show our data


?>


<? echo "Starlight Rose x200 price=".$Starlight_Rose.'</br> Fjarnskaggl x200 price='.$Fjarnskaggl.'</br> Dreamleaf x200 price='.$Dreamleaf.'</br> Flask of the Wispered Pact x1 price='.$Wispered_Pact.'</br> Flask of the Wispered Pact crafting cost='.$Wisper_Crafting_Cost.'</br> Profit='.$Wisper_Profit.'</br> Who sell cheapest one? '.$Wispered_Last_Seller ?>

<html>
<center><h2> Category: Alchemy</h2>
<center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:16px;padding:1px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:16px;font-weight:normal;padding:2px 2px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-9nbt{font-size:12px;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top;}
.tg .tg-9right{font-size:12px;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:right;vertical-align:top}
.tg .tg-9left{font-size:12px;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:left;vertical-align:top;}
.tg .tg-9center{font-size:12px;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}

a, u {
    text-decoration: none;
}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 980px">
<colgroup>
<col style="width: 15px">
<col style="width: 150px">
<col style="width: 31px">
<col style="width: 55px">
<col style="width: 50px">
<col style="width: 60px">
<col style="width: 40px">
<col style="width: 70px">
<col style="width: 120px">
</colgroup>
  <tr>
  	<th class="tg-9nbt">!</th>
    <th class="tg-9nbt">Item name:</th>
    <th class="tg-9right">Stack:</th>
    <th class="tg-9right">Low buy:</th>
    <th class="tg-9right">$/1:</th>
<th class="tg-9right">Craft 200:</th>
<th class="tg-9right">Available:</th>
<th class="tg-9center">Profit:</th>
<th class="tg-9left">Seller:</th>
  </tr>Alchemy: Legion Flasks

<tr> <td>

<? if ($Wisper_Profit>10) {if ($Wispered_Last_Seller=="Yoshyoka") echo '<img src="2.gif"'; else echo '<img src="1.gif"';};?></td>
<td><a href="//www.wowhead.com/item=127847" class="q3" rel="gems=23121&amp;ench=2647&amp;pcs=25695:25696:25697"></td><td align="right">1</td><td align="right"><? echo round($Wispered_Pact,2)?><img src="gold.png"><td align="right"><? echo round($Wispered_Pact,2) ?><img src="gold.png"><td align="right"><? echo round($Wisper_Crafting_Cost,2). '<img src="gold.png">'?></td><td align="right"><? echo $Wispered_Pact_Q?></td><td align="right"><? if ($Wisper_Profit>0)  echo '<b><font color=green> +' .round($Wisper_Profit,2).'<img src="gold.png">'; else echo '<b><font color=red>' .round($Wisper_Profit,2).'<img src="gold.png">' ?><td><? if ($Wispered_Last_Seller==Yoshyoka) echo "<font color=green>" . $Wispered_Last_Seller; else echo "<font color=red>".$Wispered_Last_Seller ?></td></td>


</table>

