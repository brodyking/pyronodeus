<?php
/*
MicroTXT - A tiny PHP Textboard Software
Copyright (c) 2016 Kevin Froman (https://ChaosWebs.net/)

MIT License
*/
include('php/settings.php');
include('php/csrf.php');

if (! isset($_GET['post']))
{
	header('location: index.php');
	die(0);
}
$id = $_GET['post'];
$id = str_replace('/', '', $id);
$id = str_replace('\\', '', $id);

$id = htmlspecialchars($id);

$postFile = 'posts/' . $id . '.html';

if (! file_exists($postFile))
{
	http_response_code(404);
	header('location: 404.html');
	die(0);
}

$data = file_get_contents($postFile);
// DomDocument is stupid and likes to append tags automatically, & breaks without a doctype.
$data = str_replace('<!DOCTYPE HTML>', '', $data);
$data = str_replace('<body>', '', $data);
$data = str_replace('</body>', '', $data);
$data = str_replace('<html>', '', $data);
$data = str_replace('</html>', '', $data);

if (isset($_SESSION['mtStaff'])){
  $rank = $_SESSION['mtStaff'];
}
else{
  $rank = '';
}
// Check if they can moderate (both moderators and admins can do this)
if ($rank != '' and $rank !== false){
  $mod = true;
}
else{
  $mod = false;
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?php echo $siteTitle . ' - ' . htmlspecialchars($id);?></title>
	<link rel="icon" type="image/x-icon" href="favicon.png?v=1">
	<link rel='stylesheet' href='style.css'>
	<style>
        .title {
            font-family: -apple-system,BlinkMacSystemFont,helvetica neue,roboto,Roboto,Arial,noto sans,sans-serif,apple color emoji,segoe ui,segoe ui emoji,segoe ui symbol,noto color emoji;
--color-mode: dark;
--h1-color: white;
--font-color: #b3b9c5;
--heading-color: #ffd479;
--dark-font-color: #ced4da;
--background: #1f2022;
--medium-font-color: #dee2e6;
--light-font-color: #868e96;
--light-background: #2D2D31;
--light-background-hover: #3b3b3e;
--code-background-color: #2e2e30;
--border: #404040;
--link-color: #6ab0f3;
--link-color-darker: #4a72a5;
--link-hover-color: #e1a6f2;
--navbar-color: #1d1d1d;
--blockquote: #2b2b2b;
--blockquote-left: #191919;
--transparent-text: rgba(255, 255, 255, 0.7);
--transparent-bg: rgba(0, 0, 0, 0.2);
--light-transparent-bg: rgba(255, 255, 255, 0.05);
box-sizing: border-box;
color: var(--heading-color);
margin: 0 0 5px;
font-weight: 700;
line-height: 1.2;
-webkit-font-smoothing: antialiased;
font-size: 1.75rem;
padding-bottom: .5rem;
border-bottom: 4px solid var(--light-background);
}
.title::before {
    content: "📜 ";
}

.name {
    color: #ffd479;
    font-weight: bold;
}

.name::before {
    content: ""
}

.name::after {
    content: " 👥"
}

.postID {
    display: none;
}

.replyTo {
    display: none;
}

br {
    display: none;
}

a::before {
    content: "🔗"
}
.a::before {
    content: ""
}
.deletedPost {
    color: red;
}
.post {
  border-bottom: 4px solid #2d2d31;
  padding: 0px;
  margin: 0px;
}
.deletedPost {
    text-size: #1rem;
    margin: 0px;
}
	</style>
</head>
<body>
<main>
<nav class="navbar">
		<div class="container">
			<div class="flex">
				<div>
					<a class="brand a" href="../index.html">

						<span class="emoji">
                        🧙️
                    </span>
                    
                    Pyronode
                    </a>
            </div>
            <div class="flex">
                <a class="a" href="../articles.html">Articles</a>
                <a class="a" href="../forum.php.html">Forum</a>
            </div>
            </div>
    </div>
</nav><div class="container">

	
	<?php
	echo $data;
	?>
	<h2 id='replyTitle'>📧 Reply</h2>
	
    	<table><tbody>
    	    	<form method='post' action='reply.php' id='reply'>
          <tr><td>Name</td><td><input required type='text' name='name' maxlength='20' value='Anonymous'></td></tr>
          <tr><td>Tripcode</td><td><input type='password' name='tripcode' maxlength='100'><input required style="display:none;" name='replyTo' type='text' maxlength='30' id='replyTo'></td></tr>
		    <?php
	    	/*
	    	<label><input name='sage' type='checkbox'> Sage (Don't bump)</label>
	    	<br><br>
	    	*/?>
          <tr><td>Post Body</td><td><textarea required name='text' maxlength='100000' placeholder='Text Post' cols='50' rows='10'></textarea></td></tr>
        <?php
			if ($captcha)
			{
				if (! isset($_SESSION['currentPosts']))
				{
					$_SESSION['currentPosts'] = $postsBeforeCaptcha;
				}
				if ($_SESSION['currentPosts'] >= $postsBeforeCaptcha)
				{
					echo '<img src="php/captcha.php" alt="captcha">';
					echo '<br><br><label>Captcha Text: <input required type="text" name="captcha" maxlength="10"></label><br><br>';
				}
			}
		?>
          <tr><td>Terms</td><td><input type="checkbox"  name="gender" required> I have read <a style="font-family: -apple-system,BlinkMacSystemFont,helvetica neue,roboto,Roboto,Arial,noto sans,sans-serif,apple color emoji,segoe ui,segoe ui emoji,segoe ui symbol,noto color emoji;
font-weight: 400;
line-height: 1.75;
--color-mode: dark;
--h1-color: white;
--font-color: #b3b9c5;
--heading-color: #ffd479;
--dark-font-color: #ced4da;
--background: #1f2022;
--medium-font-color: #dee2e6;
--light-font-color: #868e96;
--light-background: #2D2D31;
--light-background-hover: #3b3b3e;
--code-background-color: #2e2e30;
--border: #404040;
--link-color: #6ab0f3;
--link-color-darker: #4a72a5;
--link-hover-color: #e1a6f2;
--navbar-color: #1d1d1d;
--blockquote: #2b2b2b;
--blockquote-left: #191919;
--transparent-text: rgba(255, 255, 255, 0.7);
--transparent-bg: rgba(0, 0, 0, 0.2);
--light-transparent-bg: rgba(255, 255, 255, 0.05);
font-size: 1.05rem;
box-sizing: border-box;
background-color: transparent;
color: inherit;
text-decoration: none;
box-shadow: 0 -2px 0 rgba(189,195,199,.5)inset;
transition: all .3s ease;" class="a" href="info.txt">the rules</a> before replying!</td></tr>
          <tr><td>Submit</td><td><input type='hidden' name='CSRF' value='<?php echo $CSRF;?>'><input type='hidden' name='threadID' value='<?php echo $id;?>'><input type='submit' value='Reply'></td></tr>
    </form></tbody></table>


	<script src='view.js'></script>
	<?php
	if ($keepSessionAlive == true){
		echo '<iframe src="keep-alive.php" style="display: none;"></iframe>';
	}
	?>
		<?php
  if ($mod){
    echo '    	<h2>👮 Delete Posts</h2><table><tbody><form method="post" action="deleter.php"
                 <tr><td>Post ID</td><td><input type="hidden" name="CSRF" value=' . $CSRF . '><input name="replyID" type="text" placeholder="reply id"></td></tr>
                 <tr><td>Submit</td><td><input type="hidden" name="thread" value="' . $id . '"><input type="submit" value="Delete Reply"></td></tr>
                 </form>';
  }
	?>
	</div>
	</main>
</body>
</html>