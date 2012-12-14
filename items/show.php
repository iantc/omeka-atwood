<?php head(array('title' => item('Dublin Core', 'Title'),'bodyid'=>'items','bodyclass' => 'show')); ?>







<div class="container">
<div id="primary" class="content">

	<div class="row">
		<div class="twelve columns">
		
		
		</div>
	</div>

	
	
	<div class="row">
		<div class="nine columns">
			
			<div id="primary">
        <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

        <div class="item hentry">

<?php 
    if (function_exists('tei_display_installed')){ 
        $section = !empty($_GET['section']) ? $_GET['section'] : false;
        
        echo render_tei_files($item->id,  $section); 
    } 
?>
            
        </div><!-- end item hentry --> 

		<?php echo plugin_append_to_items_show(); ?>
              
		<ul class="item-pagination navigation">
		<li id="previous-item" class="previous">
			<?php echo link_to_previous_item(); ?>
		</li>
		<li id="next-item" class="next">
			<?php echo link_to_next_item(); ?>
		</li>
		</ul>  
              
   </div>
         <!-- end #primary-->
			
		</div>
			

		
	<div class="three columns"> 
	
		<div class="three columns aside1">
		
		<div class="panel">
		<button id="add">Add Meta</button>
		<button id="rem">Remove Meta</button>
		</div>
		
		<div id="thething" class="panel">
		<h2>Meta</h2>
		
		
<script>
$(document).ready(function(){
  $("button#add").click(function(){
    $("span").addClass("tei");
    $("div#thething").removeClass("hide");
    
  });
});

$(document).ready(function(){
  $("button#rem").click(function(){
    $("span").removeClass("tei");
    $("div#thething").addClass("hide");
    
  });
});
</script>
		
		<div id="thing">
		</div>
		</div>
		
			<div class="panel aside hide">	
			
			 <div class="item-meta">
				<?php while(loop_files_for_item()): ?>
		
                   <div class="item-img">	<?php 
				        $file = get_current_file();
				        if ($file->hasThumbnail()):
			            echo display_file($file,array('imageSize'=>'fullsize'));
			            endif;
			        ?>					
				   </div>
				
				<?php endwhile; ?>

                <?php echo custom_show_item_metadata(); ?>
					
             </div>  <!-- end item-meta -->    
			
			 <div id="secondary">
        <div id="show-sidebar">
      
		
        
	         <dl>
             <!-- 
<dt id="publisher"><?php echo __('Date Added'); ?></dt>
	         <dd><?php echo rhythm_display_date_added(); ?></dd>
 -->
	        
	         <?php if (item_belongs_to_collection()): ?>
             <dt id="creator"><?php echo __('Collection'); ?></dt>
	         <dd><?php echo link_to_collection_for_item(); ?></dd>
	         <?php endif; ?>
	         
	         <?php if (item_has_type()): ?>
             <dt id="source"><?php echo __('Item Type'); ?></dt>
	         <dd><?php echo item('Item Type Name'); ?></dd>
	         <?php endif; ?>
	         
	         <?php if(item_has_tags()): ?>
            <dt><?php echo __('Tags'); ?></dt>
			<dd><?php echo item_tags_as_string(); ?></dd>
			<?php endif;?>   
			      
             <dt id="subject"><?php echo __('Citation'); ?></dt>
	         <dd><?php echo item_citation(); ?></dd>
             <dt id="files"><?php echo __('Files'); ?></dt>
	         <!-- The following returns all of the files associated with an item. -->
			 <dd>	
				<?php $hasShownFile = false; ?>
		            
	 		  	<?php while(loop_files_for_item()): ?>

	     		    <?php 
	     		        $file = get_current_file();
	     		        if (!$file->hasThumbnail()):
	     		          echo display_file($file);
	     		          $hasShownFile = true;
	     		        endif;
	     		    ?>
     

	     		<?php endwhile; ?>
 		
	     		<?php if (!$hasShownFile): ?>
                    <?php echo __('No files are associated with this item.'); ?>
	 		    <?php endif; ?>
	         </dd>
	         </dl>
        </div> <!-- end show-sidebar -->
   </div> <!-- end #secondary -->
			
			
			
			</div>	

	
	</div>
	</div>












   
  
<?php foot(); ?>
