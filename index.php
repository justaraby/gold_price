<?php
// curl AED
function get_price_aed(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=AED&from=XAU&amount=1",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: xy3IeCsxYxUNO6SBDohx0uH4EC72BEY4"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response, true);
    $ounce = $result['result'];

    $gram = ($ounce/31.1034768)/24;
    return $gram;
}


$cached_price = get_transient( 'gold_price' );
if ( $cached_price == false ) {
	$gram_price = get_price_aed();
	set_transient( 'gold_price', $ounce ,360); // cache for 6 hours
}else{
	$gram_price = $cached_price;
}
//$gram_aed = get_price_aed();
//$gram_usd = get_price('USD');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Jumbotron example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
      <main>
          <div class="container pt-5 pb-5">
<table id="main-table" align="center" cellpadding="4" cellspacing="1" class="prices-table table" width="100%">
	<caption>متوسط اسعار الذهب اليوم بأسواق المال في الامارات بالدرهم الاماراتي</caption>
	<thead>
	<tr>
		<th>الوحدة</th>
		<th>درهم اماراتي</th>
		<th>دولار أمريكى</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<th>اسعار الذهب عيار 24</th>
		<td><?php echo $gram_price * 24 ; ?> درهم</td>
		<td>$58.92</td>
	</tr>
	<tr>
		<th>سعر الذهب عيار 22</th>
		<td><?php echo $gram_price * 22 ; ?> درهم</td>
		<td>$54.01</td>
	</tr>
	<tr>
		<th>اسعار الذهب عيار 21</th>
		<td><?php echo $gram_price * 21; ?> درهم</td>
		<td>$51.55</td>
	</tr>
	<tr>
		<th>اسعار الذهب عيار 18</th>
		<td><?php echo $gram_price * 18; ?> درهم</td>
		<td>$44.19</td>
	</tr>
	<tr>
		<th>سعر الذهب عيار 14</th>
		<td><?php echo $gram_price * 14; ?> درهم</td>
		<td>$34.37</td>
	</tr>
	<tr>
		<th>سعر الذهب عيار 12</th>
		<td><?php echo $gram_price * 12; ?> درهم</td>
		<td>$29.46</td>
	</tr>
	<tr>
		<th><b>اسعار أوقية الذهب</b></th>
		<td><?php echo $gram_price*24*31.1034768;?> درهم</td>
		<td>$1,832</td>
	</tr>
	<tr>
		<th>اسعار جنيه الذهب</th>
		<td><?php echo ($gram_price*24*7); ?> درهم</td>
		<td>-----</td>
	</tr>
	<tr>
		<th>اسعار كيلو الذهب</th>
		<td><?php echo ($gram_price*24*1000); ?> درهم</td>
		<td>$58,916</td>
	</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="3">اخر تحديث لأسعار الذهب اليوم في الامارات بتاريخ Wednesday, June 15, 2022 04:35 PM بتوقيت دولة الامارات</td>
		</tr>
	</tfoot>
	</table>
              </div>
      </main>
    </body>
</html>
