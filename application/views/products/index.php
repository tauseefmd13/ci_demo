<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1><?php echo $title ?></h1>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-8">
					<div class="search-field">
						<input type="text" class="form-control" name="search_key" id="search_key" placeholder="Search by product name" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="search-button">
						<button type="button" id="searchBtn" class="btn btn-info">Search</button>
						<button type="button" id="resetBtn" class="btn btn-warning">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="ajaxContent"></div>
		</div>
	</div>
</div>