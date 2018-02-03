<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#gradeBook" aria-controls="gradeBook" role="tab" data-toggle="tab">Boletines</a></li>
	<li role="presentation"><a href="#certificado" aria-controls="certificado" role="tab" data-toggle="tab">Certificados</a></li>
	<li role="presentation">
       <a href="#libro" aria-controls="libro" role="tab" data-toggle="tab">Libro de notas</a>
    </li>
    <li role="presentation"><a href="#diploma" aria-controls="diploma" role="tab" data-toggle="tab">Diplomas</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="gradeBook">
    	<?php include('formGradeBook.tpl.php'); ?>
    </div>
	<div id="certificado" rolle="tabpanel" class="tab-pane">
        <?php include('certificate.tpl.php'); ?>
    </div>
	 <div id="libro" rolle="tabpanel" class="tab-pane">
        <?php include('libro.tpl.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="diploma">
    	<div class="container fluid">
    		<div class="row">
				<?php if(isset($db) && $db=='agoranet_simonb'): ?>
    			<div class="row">
					<div class="col-md-12" style="margin-top: 2rem;">
    					<a href="<?php echo pb;?>/diploma/5.1.1/diplomas.pdf" class="btn btn-primary" target="_blank">5 1-1</a>
    					<a href="<?php echo pb;?>/diploma/5.1.2/diplomas.pdf" class="btn btn-primary" target="_blank">5 1-2</a>
    				</div>	
				</div>
				<div class="row">
                <div class="col-md-12" style="margin-top: 2rem;">
                    <a href="<?php echo pb;?>/diploma/t.1.1/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 1-1</a>
                    <a href="<?php echo pb;?>/diploma/t.1.2/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 1-2</a>
                    <a href="<?php echo pb;?>/diploma/t.2.1/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 2-1</a>
                    <a href="<?php echo pb;?>/diploma/t.2.2/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 2-2</a>
                    <a href="<?php echo pb;?>/diploma/t.3.1/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 3-1</a>
                    <a href="<?php echo pb;?>/diploma/t.3.2/diplomas.pdf" class="btn btn-primary" target="_blank">Transición 3-2</a>
                </div>
            </div>
				<?php endif; ?>
    		</div>
    	</div>
    </div>
  </div>

</div>