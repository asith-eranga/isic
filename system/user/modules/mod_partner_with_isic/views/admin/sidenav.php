<div class="three wide column">

	<div class="ui small vertical pointing menu">
    
		<?php if(Sessions::checkUserPermission("mod_partner_with_isic",1)){ ?>
		<a id="side_nav_view" class="active item" onclick="view(1)">
		  <i class="folder outline icon"></i> View Partner With ISIC
		</a>
        <?php } if(Sessions::checkUserPermission("mod_partner_with_isic",2)){ ?>
		<a id="side_nav_add" class="item" onclick="add()">
		  <i class="add icon"></i> Add Partner With ISIC
		</a>
        <?php } ?>

	</div>

</div>