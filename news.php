<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>Galaxy News</title>
	<style>
	<!-- Styling properties -->
		@media screen and (max-width:480px){
			div{
				overflow:hidden;
			}
			h1{
				color:orange;
			}
		}
		a{
			font-family: Verdana;
			color: #0000ff;
			float:right
		}
		img{
			padding: 5px 15px 5px 10px;
			float: left;
			width: 100px;
			height: 80px;
			vertical-align: text-bottom;
		}
		.background{
			background-color : #400000;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			
		}
		.new{
			background-image: url("banner.jpg");
		}
		.setMainMenuStyle{
			background-color: #400000;
		}
		.setMainMenuStyle:hover {
			background-color: yellow;
		}
		h1{
			color: white;
		}
		.headline {
			background-color : #400000;
			padding-left: 5px;
			font-size: 1.3em;
			text-decoration:bold;
			color: white;
		}
		.category {
			background-color : #009900;
			padding-left: 5px;
			font-size: 1.3em;
			text-decoration:bold;
			color: white;
		}
		.myfooter {
				background-color: #eee;
		}
		.main {
			margin-left: 3em;
		}
		small{
			font-family:Helvetica; 
			}
		body {
			background-image: url("background.jpg");
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		function showFullStory(id){

			window.event.preventDefault();
			var form = document.createElement('form');
		    form.method = 'post';
		    form.action = 'story.php';
		    var input = document.createElement('input');
			input.type = 'text';
			input.name = 'link';
			input.value = $(id).attr('href');
			form.appendChild(input);
		    form.submit();
		}
	</script>
	<div class="background new">
	<!-- Header -->
		<div style="float:left"><img src="gn_logo.jpg" width=80px; height=75px;/></div>
		<h1 style="padding: 2px 100px;" > Galaxy News<br><small>beyond the headlines...</small></h1>
	</div>
	<div>
		<nav class="background navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">HOME</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">WORLD</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class=" navbar-brand" href="#">BUSINESS</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">POLITICS</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">TECHNOLOGY</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">ENTERTAINMENT</a>
		    </div>
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">WEATHER</a>
		    </div>
			<!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <form style="float:right;" class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search for news">
		        </div>
		        <button type="submit" class="btn btn-primary">Search</button>
		      </form>
		    </div><!-- /.navbar-collapse -->
			</div>
		</nav>
		
	</div>

<?php
	echo "<div class='main col-md-9'>";
	
	//Geo News
	$link = "https://www.geo.tv/latest-news/";


	$curl = curl_init($link);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}
	curl_close($curl);
	$regex = '/<div id="case_textlist">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
	    echo $list[0];
	else 
	    print "Not found"; 
	
	echo $curl;
	exit;

	$html = file_get_html($link);
	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$cl = curl_exec($ch);
	$dom = new DOMDocument();
	@$dom->loadHTML($cl);
	$xpath = new DOMXpath($dom);

	echo "<div class='category' style='text-align:center;'>NATIONAL SOURCES</div>";


	for($i=0; $i<3; $i++) {

		$query = $xpath->query("//div[@class='news_box']/h2[@class='cat_article_title']/a");
		$heading = $query->item($i)->nodeValue;
		$query = $xpath->query("//div[@class='news_box']/h2[@class='cat_article_title']/a/@href");
		$more = $query->item($i)->nodeValue;
		$query = $xpath->query("//div[@class='news_box']/div[@class='news_box_left']/div[@class='recent_news_item']/div[@class='recent_news_img']/a/img/@src");
		$imagesource = $query->item($i)->nodeValue;
		$query = $xpath->query("//div[@class='news_box']/div[@class='news_box_left']/div[@class='recent_news_item']/div[@class='recent_news_img']/a/img/@alt");
		$imagealt = $query->item($i)->nodeValue;
		$query = $xpath->query("//div[@class='news_box']/div[@class='news_box_left']/div[@class='recent_news_item']/div[@class='recent_news_content']/p/span");
		$description = $query->item($i)->nodeValue; 

		echo "<div class='headline'>" . $heading . "</div>";
		echo "<div><img src='". $imagesource ."' alt='" . $imagealt . "'/></div>";
		echo "<div style='padding-top:5px; height:4em;'>" . $description . "</div>";
		echo "<div style='padding-top:1em; color:#6699ff'> geo.tv </div>";
		echo "<div><a onClick='showFullStory(this)' href='" . $link . $more . "'>Read More</a></div>";
		echo "<hr/>";
	}
	
	//Dawn News
	$link = "http://www.dawn.com/pakistan";

	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$cl = curl_exec($ch);
	$dom = new DOMDocument();
	@$dom->loadHTML($cl);
	$xpath = new DOMXpath($dom);

	for($i=0; $i<3; $i++) {

		$query = $xpath->query("//div/article/h2/a");
		$heading = $query->item($i)->nodeValue;
		$query = $xpath->query("//div/article/h2/a/@href");
		$more = $query->item($i)->nodeValue;
		$query = $xpath->query("//div/article/table//img/@src");
		$imagesource = $query->item($i)->nodeValue;
		$query = $xpath->query("//div/article/div[@class='story__excerpt  ']/text()[1]");
		$description = $query->item($i)->nodeValue;

		echo "<div class='headline'>" . $heading . "</div>";
		echo "<div><img src='". $imagesource ."'/></div>";
		echo "<div style='padding-top:5px; height:4em;'>" . $description . "</div>";//substr($description, 0, strpos($description, '<'))
		echo "<div style='padding-top:1em; color:#6699ff'> dawn.com </div>";
		echo "<div><a onClick='showFullStory(this)' href='" . $more . "'>Read More</a></div>";
		echo "<hr/>";
	}
	
	//BBC News
	$link = "http://www.bbc.co.uk/search?q=pakistan&filter=news";
	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$cl = curl_exec($ch);
	$dom = new DOMDocument();
	@$dom->loadHTML($cl);
	$xpath = new DOMXpath($dom);
	echo "<div class='category' style='background-color: #4387fd; text-align:center;'>INTERNATIONAL SOURCES</div>";
	
	for($i=0; $i<3; $i++)
	{
		$query = $xpath->query("//section[@class='search-content']/ol/li/article/div/h1/a");
		$heading = $query->item($i)->nodeValue;
		$query = $xpath->query("//section[@class='search-content']/ol/li/article/div/h1/a/@href");
		$more = $query->item($i)->nodeValue;
		$query = $xpath->query("//section[@class='search-content']/ol/li/article/a/img/@src");
		$imagesource = $query->item($i)->nodeValue;
		$query = $xpath->query("//section[@class='search-content']/ol/li/article/a/img/@alt");
		$imagealt = $query->item($i)->nodeValue;
		$query = $xpath->query("//section[@class='search-content']/ol/li/article/div/p[@class='summary long']");
		$description = $query->item($i)->nodeValue;
		
		$description = str_replace("¦","",$description);
		$description = str_replace("â","",$description);
		$description = str_replace("€","",$description);
		$description = substr_replace($description, "", -17);
		$description = substr($description, 3);
		$description .= "...";
		echo "<div class='headline'>" . $heading . "</div>";
		echo "<div><img src='". $imagesource ."' alt='" . $imagealt . "'/></div>";
		echo "<div style='padding-top:5px; height:4em;'>" . $description  . "</div>";
		echo "<div style='padding-top:1em; color:#6699ff'> bbc.co.uk </div>";
		echo "<div><a onClick='showFullStory(this)' href='" . $more . "'>Read More</a></div>";
		echo "<hr/>";
	}
	
	//Fox News
	$link = "http://www.foxnews.com/search-results/search?&submit=Search&q=pakistan&ss=fn&mc_Text=17149&mc_Video=4279&mediatype=Text";
	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$cl = curl_exec($ch);
	$dom = new DOMDocument();
	@$dom->loadHTML($cl);
	$xpath = new DOMXpath($dom);

	// Loop for scraping items
	for($i=0; $i<3; $i++) {

		$query = $xpath->query("//div/ol[@class='ez-mod-content']/li/div/a");	//xPath query
		$heading = $query->item($i)->nodeValue;									//extracting nodevalues
		$query = $xpath->query("//div/ol[@class='ez-mod-content']/li/div/div[@class='ez-itemUrl']/a/@href");
		$more = $query->item($i)->nodeValue;

		$ch = curl_init($more);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$cl = curl_exec($ch);
		$dom = new DOMDocument();
		@$dom->loadHTML($cl);
		$ypath = new DOMXpath($dom);
		$query = $ypath->query("//div[@itemprop='articleBody']//img/@src");
		$imagesource = $query->item(0)->nodeValue;
		$query = $ypath->query("//div[@itemprop='articleBody']//img/@alt");
		$imagealt = $query->item(0)->nodeValue;

		$query = $xpath->query("//div/ol[@class='ez-mod-content']/li/div/p");
		$description = $query->item($i)->nodeValue;

		echo "<div class='headline'>" . $heading . "</div>";
		echo "<div><img src='". $imagesource ."' alt='" . $imagealt . "'/></div>";
		echo "<div style='padding-top:5px; height:4em;'>" . $description . "</div>";
		echo "<div style='padding-top:1em; color:#6699ff'> foxnews.com </div>";
		echo "<div><a onClick='showFullStory(this)' href='" . $more . "'>Read More</a></div>";
		echo "<hr/>";
	}

	echo "</div>";
 ?>
	<!-- Footer -->
		<div>
			<div class=" myfooter col-md-4">
				<h4 class="label label-info foo-head">About Galaxy News</h4>
				<ul>
					<li>About Us</li>
					<li>Galaxy News International</li>
					<li>Site Map</li>
					<li>Editorial Guideline</li>
				</ul>
			</div>
			<div class="myfooter col-md-4">
				<h4 class="label label-info foo-head">Galaxy News Services</h4>
				<ul>
					<li>Galaxy News Live Streaming</li>
					<li>Galaxy News RSS</li>
					<li>Galaxy News for Smartphones</li>
					<li>Galaxy News Radio</li>
				</ul>
			</div>
			<div class="myfooter col-md-4">
				<h4 class="label label-info foo-head">News Channels</h4>
				<ul>
					<li>Galaxy 1</li>
					<li>Galaxy Plus</li>
					<li>Galaxy Living</li>
					<li>Galaxy Sports</li>
				</ul>
			</div>
			<center><div class="col-md-12">
			<h4>&#169 2014-15 by Galaxy News Network. All rights reserved.</h4>
			</div></center>
		</div>
</body>
</html>