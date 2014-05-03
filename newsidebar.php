<div class="span3" id="sidebar">
<div class="well sidebar-nav">
<!--
Filter by:
Shortlist status:
Yes
Yes and not decided yet
Not decided yet
No

Vote status:
All yeses
Yeses and maybes
Haven't been voted on yet
I haven't voted on yet

themes
characters
-->
<h3>Sort by</h3>
<ul>
<?php echo '<li><a href="' . add_or_change_parameter("sortby", 'votes') . '">Votes</a></li>'; ?>
<?php echo '<li><a href="' . remove_parameter("sortby") . '">Date received</a></li>'; ?>
</ul>
<br>
<h3>Filter by</h3>
<b>Shortlisted:</b>
<ul>
<?php echo '<li><a href="' . site_url() . "/storylist/" .  add_or_change_parameter("shortlisted", 'yes') . '">Yes</a></li>'; ?>
<?php echo '<li><a href="' . site_url() . "/storylist/" .  add_or_change_parameter("shortlisted", 'no') . '">No</a></li>'; ?>
<?php echo '<li><a href="' . site_url() . "/storylist/" .  add_or_change_parameter("shortlisted", 'tbd') . '">Not decided</a></li>'; ?>
</ul>
<?php echo '<a href="' . remove_parameter("shortlisted") . '">Reset shortlist filter</a>'; ?>
<br><br>
<b>Not yet voted on:</b>
<ul>
<?php echo '<li><a href="' . site_url() . "/storylist/" .  add_or_change_parameter("voted", 'ihavent') . '">By me</a></li>'; ?>
<?php echo '<li><a href="' . site_url() . "/storylist/" .  add_or_change_parameter("voted", 'nobodyhas') . '">By anyone</a></li>'; ?>
</ul>
<?php echo '<a href="' . remove_parameter("voted") . '">Reset not yet voted filter</a>'; ?>

</div><!-- .well #sidebar-nav -->

</div><!-- .span3 #sidebar -->
