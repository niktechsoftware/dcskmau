<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-6">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-green border-light">
				<h4 class="panel-title">Add Category</h4>
				<div class="panel-tools">										
        			<div class="dropdown">
        				<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey"><i class="fa fa-cog"></i></a>
        				<ul class="dropdown-menu dropdown-light pull-right" role="menu">
        					<li><a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a></li>
        					<li><a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a></li>
        					<li><a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a></li>										
        				</ul>
        			</div>
				</div>
		    </div>
			<div class="panel-body">
			    <form action="<?php echo base_url();?>configure/saveCategory"  method ="post">
			    <div class="col-md-12">
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Category Title</label>
								<input type="text" name="category" required="true"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<button class="btn btn-default">Add Category</button>
							</div>
						</div>
					</div>
                </div>
                </form>
			</div>	
		</div>
	</div>
	<div class="col-sm-6">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-yellow border-light">
				<h4 class="panel-title">Category List</h4>
				<div class="panel-tools">										
        			<div class="dropdown">
        				<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey"><i class="fa fa-cog"></i></a>
        				<ul class="dropdown-menu dropdown-light pull-right" role="menu">
        					<li><a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a></li>
        					<li><a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a></li>
        					<li><a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a></li>										
        				</ul>
        			</div>
				</div>
		    </div>
			<div class="panel-body">
			    <div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<table class="table" id="sample-table-1">
							    <thead>
							        <tr>
							            <th>#</th>
							            <th>Title</th>
							            <th>Edit</th>
							            <th>Delete</th>
							        </tr>
							    </thead>
							    <tbody>
							        <?php foreach($category as $idx => $value): ?>
							        <tr>
							            <td><?= $idx + 1 ?></td>
							            <td><?= $value->title ?></td>
							            <td><button id="edit-<?= $value->id ?>" class="btn btn-warning">Edit</button></td>
							            <td><button id="delete-<?= $value->id ?>" class="btn btn-danger">Delete</button></td>
							        </tr>
							        <?php endforeach; ?>
							    </tbody>
							</table>
						</div>
					</div>
                </div>
			</div>	
		</div>
	</div>
</div>
<script type="text/javascript">
    
</script>
									

