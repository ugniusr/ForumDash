		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php } ?>
		</div><!--/fluid-row-->
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="#" target="_blank">by Muhammad Usman</a> <?php echo date('Y') ?></p>
			<p class="pull-right">Powered by: <a href="#">Charisma template</a></p>
		</footer>
		<?php } ?>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
<?php echo $this->headScript()->prependFile($this->basePath() . '/js/jquery-ui-1.8.21.custom.min.js')
->prependFile($this->basePath() . '/js/topicsvalidation.js')
/*

->prependFile($this->basePath() . '/js/bootstrap-transition.js')
->prependFile($this->basePath() . '/js/bootstrap-alert.js')
->prependFile($this->basePath() . '/js/bootstrap-modal.js')
->prependFile($this->basePath() . '/js/bootstrap-dropdown.js')
->prependFile($this->basePath() . '/js/bootstrap-scrollspy.js')
->prependFile($this->basePath() . '/js/bootstrap-tab.js')
->prependFile($this->basePath() . '/js/bootstrap-tooltip.js')
->prependFile($this->basePath() . '/js/bootstrap-popover.js')
->prependFile($this->basePath() . '/js/bootstrap-button.js')
->prependFile($this->basePath() . '/js/bootstrap-collapse.js')
->prependFile($this->basePath() . '/js/bootstrap-carousel.js')
->prependFile($this->basePath() . '/js/bootstrap-typeahead.js')
->prependFile($this->basePath() . '/js/bootstrap-tour.js')
->prependFile($this->basePath() . '/js/jquery.cookie.js')
->prependFile($this->basePath() . '/js/fullcalendar.min.js')
->prependFile($this->basePath() . '/js/jquery.dataTables.min.js')
->prependFile($this->basePath() . '/js/excanvas.js')
->prependFile($this->basePath() . '/js/jquery.flot.min.js')
->prependFile($this->basePath() . '/js/jquery.flot.pie.min.js')
->prependFile($this->basePath() . '/js/jquery.flot.stack.js')
->prependFile($this->basePath() . '/js/jquery.flot.resize.min.js')
->prependFile($this->basePath() . '/js/jquery.chosen.min.js')
->prependFile($this->basePath() . '/js/jquery.uniform.min.js')
->prependFile($this->basePath() . '/js/jquery.colorbox.min.js')
->prependFile($this->basePath() . '/js/jquery.cleditor.min.js')
->prependFile($this->basePath() . '/js/jquery.noty.js')
->prependFile($this->basePath() . '/js/jquery.elfinder.min.js')
->prependFile($this->basePath() . '/js/jquery.raty.min.js')
->prependFile($this->basePath() . '/js/jquery.iphone.toggle.js')
->prependFile($this->basePath() . '/js/jquery.autogrow-textarea.js')
->prependFile($this->basePath() . '/js/jquery.uploadify-3.1.min.js')
->prependFile($this->basePath() . '/js/jquery.history.js')
->prependFile($this->basePath() . '/js/charisma.js')
->prependFile($this->basePath() . '/js/jquery-1.7.2.min.js')
 */
?>

<!--script at the end of the page-->
<script 
src="http://blankrefer.com/links.js" type="text/javascript"></script>
<script 
type="text/javascript"><!--
protected_links = "localhost,eglesum";

blank_refer();
//--></script>
<!--script at the end of the page-->
		
</body>
</html>
