<?php get_header(); ?>
<div class="container">
      <div class="row">
       <div class="span12">
        <div class="hero-unit" style="margin-top:10px;">
        <img id="mirror-logo" src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/03/rsz_mirror-logo2.jpg" />
        <img id="penguin-logo" src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/03/Penguin_logo.png" />
        <div id="site-title">
<h1>This is my story</h1>
<h2>Tell us your real life story and see it published!</h2>
 </div><!-- sitetitle -->
</div>

<div style="margin:40px 20px;">
<h3>Have you ever read a book and thought: My life story could make a bestseller?</h3>
 
<p>Here at <i>The Sunday Mirror</i> we have always known the value of true-life stories.</p>
 
<p>We have teamed up with publishers <i>Penguin Books</i> to offer you the opportunity of a lifetime to turn your life story into a bestselling book.</p>
 
<p>You don’t have to be a great writer. As long as you have an interesting story to tell, we’ll do the rest. We will give you as much support as you need.</p>
 
<p>What is your story? Is it an epic romance or a thriller? Perhaps you found the man of your dreams, only to discover he had another secret life. Did a tragedy lead you on an amazing journey, or were you let down by the people you trusted most? Did you get justice for a terrible crime or help someone do something extraordinary? Maybe a special animal changed your life or you discovered an explosive family secret. Did you run away to join the circus?!</p>
 
<p>Whatever your story we want to hear it.</p>
 
<p>The winning story will be turned into a book, published by Penguin and will also feature in <i>The Sunday Mirror</i>.</p>
 
<p>Submit your story here.</p>
 
<p>Even if you don’t win, your story may still be told in the pages of our newspaper.</p>
 
<p>So if you have an uplifting, inspiring, shocking, heartbreaking or dramatic tale to tell, submit your story now.</p>
<form method="post" action="<?php echo home_url(); ?>/thankyou/" class="form-horizontal">
<div class="control-group">
<label class="control-label" for="firstname" style="text-align:left;">First name:</label>
<input type="text" id="firstname" name="firstname"/>
</div>
<div class="control-group">
<label class="control-label" for="surname" style="text-align:left;">Surname:</label>
<input type="text" id="surname" name="surname"/>
</div>
<div class="control-group">
<label class="control-label" for="emailaddress" style="text-align:left;">Email address:</label>
<input type="text" id="emailaddress" name="emailaddress"/>
</div>
<div class="control-group">
<label class="control-label" for="title" style="text-align:left;">1-line synopsis:</label>
<input type="text" id="title" name="title"/>
<span class="help-block">Summarise the gist of your story in one sentence.</span>
</div>
<div class="control-group">
<label class="control-label" for="content" style="text-align:left;">Story outline:</label>
<textarea id="content" tabindex="3" name="content" cols="100" rows="6" style="width:400px;"></textarea>
<span class="help-block">In 5000 characters (around 1000 words), please tell your story.</span>
</div>
<div class="control-group">
<label class="control-label" for="post_tags" style="text-align:left;">Themes:</label>
<input type="text" value="" size="16" name="post_tags" id="post_tags" />
<span class="help-block">E.g. romance, family, coming of age, surviving disaster, etc.</span>
</div>
<div class="control-group">
<label class="control-label" for="characters" style="text-align:left;">Who's involved?</label>
<input type="text" id="characters" name="characters"/>
<span class="help-block">Let us know which characters or roles the story features, e.g. father, partner, etc.</span>
</div>
<div class="control-group">
<label class="control-label" for="impact" style="text-align:left;">The impact on you</label>
<input type="text" id="impact" name="impact"/>
<span class="help-block">Let us know in what way your life or your perspective on things was changed.</span>
</div>
<p>Prove you're human:</p>
<?php if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } ?>
<br><br>
<input type="submit" value="Publish" id="submit" name="submit" />
<input type="hidden" name="action" value="new_game_post" />
</form>
</div>

<p>This competition is brought to you by <i>The Sunday Mirror</i> in conjunction with <i>Penguin Books</i>.</p>   
<p><a href="http://www.penguin.co.uk/privacy-policy/" target="_blank">General Terms and conditions</a></p>
 
</div><!-- span12 -->
</div><!-- row-->
</div><!-- container -->
<?php get_footer(); ?>
