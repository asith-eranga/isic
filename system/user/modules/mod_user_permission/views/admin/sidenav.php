<div class="three wide column">

	<div class="ui small vertical pointing menu">
    
		<?php if(Sessions::checkUserPermission("mod_user_permission",1)){ ?>
		<a id="side_nav_view" class="active item" onclick="view(1)">
		  <i class="folder outline icon"></i> View Permissions
		</a>
        <?php } if(Sessions::checkUserPermission("mod_user_permission",2)){ ?>
		<a id="side_nav_add" class="item" onclick="add()">
		  <i class="add icon"></i> Add Permissions
		</a>
        <?php } ?>

	</div>

</div>