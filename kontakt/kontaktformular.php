<html>
<?php include('contact_form.php'); ?>
<link rel=stylesheet  href="../css/style_contact_form.css">

<div class="container">  
	<form id="contact" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	  <h3>Quick Contact</h3>
	  <h4>Contact us today, and get reply with in 24 hours!</h4>
	  <fieldset>
		<input placeholder="Your name" type="text" name="name" value= "<?= $name ?>" tabindex="1" autofocus>
		<span class="error"><?= $name_error ?></span>
	  </fieldset>
	  <fieldset>
		<input placeholder="Your Email Address" type="text" name="email"  value= "<?= $email ?>" tabindex="2">
		<span class="error"><?= $email_error ?></span>
	  </fieldset>
	  <fieldset>
		<input placeholder="Your Phone Number" type="text" name="phone"  value= "<?= $phone ?>" tabindex="3">
		<span class="error"><?= $phone_error ?></span>
	  </fieldset>
	  <fieldset>
		<input placeholder="Your Web Site starts with http://" type="text" name="url"  value= "<?= $url ?>" tabindex="4">
		<span class="error"><?= $url_error ?></span>
	  </fieldset>
	  <fieldset>
		<textarea placeholder="Type your Message Here...." tabindex="5" name="message" value= "<?= $message?>"></textarea>
	  </fieldset>
	  <fieldset>
		<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
	  </fieldset>
	  
	</form>	
	<p name="success" value=" <?=$success ?> "> </p>
  </div>
</html>
